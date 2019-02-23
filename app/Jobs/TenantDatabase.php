<?php

namespace App\Jobs;

use App\Notifications\UserRegistered;
use App\Notifications\VerifyEmail;
use App\Role;
use App\Services\TenantManager;
use App\Tenant;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class TenantDatabase
{
    use Dispatchable, InteractsWithQueue, Queueable;

    protected $tenant;

    protected $tenantManager;

    protected $data;

    public function __construct(Tenant $tenant, TenantManager $tenantManager, $data)
    {
        $this->tenant = $tenant;
        $this->tenantManager = $tenantManager;
        $this->data = $data;
    }

    public function handle()
    {
        $database = 'tenant_' . $this->tenant->id;

        $connection = \DB::connection('tenant');

        $this->dropOrCreate($connection, $database);

        $this->tenantManager->setTenant($this->tenant);

        config(['database.connections.tenant.database' => $database]);

        $connection->reconnect();

        $this->migrate();

        # returns user ID
        $id = $this->createUser($connection);

//        session(['tenant'=>$this->tenant->slug]);

        $user = User::findOrFail($id);

        $user->notify(new VerifyEmail($this->tenant->slug));

        $permissions = [];

        foreach(config('custom.permissions') as $key=>$permission)
            $permissions[$key] = [
                'read'=>'on',
                'add'=>'on',
                'delete'=>'on',
                'update'=>'on',
            ];

        $role = Role::create([
            'name'=>'Full access',
            'slug'=>'full-access',
            'permissions'=>json_encode($permissions)
        ]);

        $user->roles()->attach($role);
    }

    private function migrate()
    {
        $migrator = app('migrator');
        $migrator->setConnection('tenant');

        if (!$migrator->repositoryExists()) {
            $migrator->getRepository()->createRepository();
        }

        $migrator->run(database_path('migrations/tenants'), []);
    }

    private function createUser($connection)
    {
        return $connection->table('users')->insertGetId([
            'email' => $this->data['email'],
            'fullname' => $this->data['fullname'],
            'password' => Hash::make($this->data['password'])
        ]);
    }

    private function dropOrCreate($connection, $database)
    {
        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?";
        $db = $connection->select($query, [$database]);

        if (!empty($db)) {
            $connection->statement('DROP DATABASE ' . $database);
            $this->handle();
        }

        $connection->getPdo()->exec("CREATE DATABASE IF NOT EXISTS `{$database}`");
    }
}
