<?php

namespace App\Observers;

use App\Tenant;
use App\Services\TenantManager;
use App\Jobs\TenantDatabase;
use App\Traits\Cloudflare;

class TenantObserver
{
    use Cloudflare;

    /**
     * Handle the tenant "created" event.
     *
     * @param  \App\Tenant  $tenant
     * @return void
     */
    public function created(Tenant $tenant)
    {
        TenantDatabase::dispatch($tenant, app(TenantManager::class));

        $this->addRecord('A',
            config('custom.CLOUDFLARE_ZONE'),
            config('custom.CLOUDFLARE_API'), $tenant->company_name,
            config('custom.TENANT_HOST'), true,
            config('custom.CLOUDFLARE_EMAIL'));
    }

    /**
     * Handle the tenant "updated" event.
     *
     * @param  \App\Tenant  $tenant
     * @return void
     */
    public function updated(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "deleted" event.
     *
     * @param  \App\Tenant  $tenant
     * @return void
     */
    public function deleted(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "restored" event.
     *
     * @param  \App\Tenant  $tenant
     * @return void
     */
    public function restored(Tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "force deleted" event.
     *
     * @param  \App\Tenant  $tenant
     * @return void
     */
    public function forceDeleted(Tenant $tenant)
    {
        //
    }
}
