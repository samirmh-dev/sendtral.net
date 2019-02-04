<?php

namespace App\Jobs;

use App\Services\TenantManager;
use App\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class TenantDatabase implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable;

    protected $tenant;

    protected $tenantManager;

    public function __construct(Tenant $tenant, TenantManager $tenantManager)
    {
        $this->tenant = $tenant;
        $this->tenantManager = $tenantManager;
    }

    public function handle()
    {
        $database = 'tenant_' . $this->tenant->id;

        config(['database.connections.tenant.database'=>$database]);

        $connection = \DB::connection('tenant');

        $createMysql = $connection->getPdo()->exec("CREATE DATABASE IF NOT EXISTS `{$database}`");

        if ($createMysql) {
            $this->tenantManager->setTenant($this->tenant);
            $connection->reconnect();
            $this->migrate();
        } else {
            $connection->statement('DROP DATABASE ' . $database);
            $this->handle();
        }
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
