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
        $pos = strpos($host, env('TENANT_DOMAIN'));

        if ($pos !== false && $this->tenantManager->loadTenant(substr($host, 0, $pos - 1))) {
            return $next($request);
        }

        throw new NotFoundHttpException;
    }
}
