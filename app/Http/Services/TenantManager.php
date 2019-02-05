<?php
namespace App\Services;

use App\Tenant;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TenantManager {
    /*
     * @var null|App\Tenant
     */
    private $tenant;

    public function setTenant($tenant) {
        $this->tenant = $tenant;
        return $this;
    }

    public function getTenant() {
        return $this->tenant;
    }

    /**
     * @param string $identifier
     * @param bool $subdomain
     * @return bool
     * @throws NotFoundHttpException
     */
    public function loadTenant(string $identifier, bool $subdomain): bool {
        $tenant = Tenant::query()->where($subdomain ? 'subdomain' : 'domain', '=', $identifier)->first();

        if ($tenant) {
            if (! $subdomain && !$tenant->canHaveDomain()) {
                throw new NotFoundHttpException;
            }
            $this->setTenant($tenant);
            return true;
        }

        return false;
    }
}