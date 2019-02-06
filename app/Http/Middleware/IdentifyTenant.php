<?php

namespace App\Http\Middleware;

use App\Services\TenantManager;
use Closure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IdentifyTenant
{

    protected $tenantManager;

    public function __construct(TenantManager $tenantManager)
    {
        $this->tenantManager = $tenantManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException
     */
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();
        $tenant = str_replace('.'.config('custom.TENANT_DOMAIN'),'', $host);

        if ($tenant !== false && $this->tenantManager->loadTenant($tenant, true)) {
            session(['tenant'=>$tenant]);

            return $next($request);
        }

        throw new NotFoundHttpException;
    }
}
