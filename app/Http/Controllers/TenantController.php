<?php

namespace App\Http\Controllers;

use App\Providers\TenantServiceProvider;
use App\Services\TenantManager;
use App\Tenant;
use App\Traits\Cloudflare;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    use Cloudflare;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }

    public function requestResetPassword(Request $request, TenantManager $tenantManager)
    {
        $request->validate([
            'company'=>'required|string|exists:tenants,company_name'
        ]);

        $tenantManager->loadTenant($request['company']);

        return redirect()->route('tenant:password.request',['tenant'=>$tenantManager->getTenant()->slug]);
    }
}
