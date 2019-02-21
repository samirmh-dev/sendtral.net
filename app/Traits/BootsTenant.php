<?php

namespace App\Traits;

use App\Providers\AppServiceProvider;
use App\Providers\TenantServiceProvider;
use App\Services\TenantManager;
use Illuminate\Queue\SerializesModels;

/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 17.02.2019
 * Time: 23:07
 */

trait BootsTenant
{
    protected $tenantId;

    /**
     * Prepare the instance for serialization.
     *
     * @param TenantManager $tenantManager
     * @return array
     */
    public function __sleep(TenantManager $tenantManager)
    {
        $this->tenantId = $tenantManager->getTenant()->id;

        return array_keys(get_object_vars($this));
    }

    /**
     * Restore the ENV, and run the service provider
     */
    public function __wakeup()
    {
        // We need to set the TENANT_ID env, and also force the BootTenantServiceProvider again

        app()->register(TenantServiceProvider::class, [], true);
    }
}
