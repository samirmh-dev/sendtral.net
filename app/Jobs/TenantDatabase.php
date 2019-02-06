<?php

namespace App\Jobs;

use App\Services\TenantManager;
use App\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class TenantDatabase implements ShouldQueue
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

        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?";
        $db = $connection->select($query, [$database]);

        if (!empty($db)) {
            $connection->statement('DROP DATABASE ' . $database);
            $this->handle();
        }

        $connection->getPdo()->exec("CREATE DATABASE IF NOT EXISTS `{$database}`");

        $this->tenantManager->setTenant($this->tenant);

        config(['database.connections.tenant.database' => $database]);

        $connection->reconnect();

        $this->migrate();

        $connection->table('users')->insert([
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password'])
        ]);
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
}
