<?php

namespace App\Http\Middleware;

use App\Services\TenantManager;
use Closure;

class AuthTenant
{
    protected $tenantManager;

    public function __construct(TenantManager $tenantManager)
    {
        $this->tenantManager = $tenantManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth('web')->check();

        if(!$user) {
            return redirect()->route('login')->with('status', 'You need to login');
        }

        return $next($request);
    }
}
