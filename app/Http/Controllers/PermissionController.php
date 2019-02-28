<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Services\TenantManager;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('read', Permission::class);
        return view('dashboard.security.permissions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', Permission::class);

        \DB::setDefaultConnection('tenant');

        $request->validate([
            'role' => 'required|exists:roles,slug',
            'page' => 'required|string',
            'read'=>'sometimes|required|accepted',
            'add'=>'sometimes|required|accepted',
            'update'=>'sometimes|required|accepted',
            'delete'=>'sometimes|required|accepted',
        ]);

        $role = Role::whereSlug($request['role'])->get()->first();

        if($role->permissions()->wherePage($request['page'])->get()->first())
            return redirect()->back()->with('warning','This permission already exists. Edit permissions despite creating new one');

        $role->permissions()->create([
           'page'=>$request['page'],
           'permissions'=>json_encode([
               'read'=>$request['read']??false,
               'add'=>$request['add']??false,
               'update'=>$request['update']??false,
               'delete'=>$request['delete']??false,
           ])
        ]);

        return redirect()->back()->with('success','Permission successfully added to role');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $tenant
     * @param  \Illuminate\Http\Request $request
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update($tenant, Request $request, Permission $permission)
    {
        $this->authorize('update', Permission::class);

        \DB::setDefaultConnection('tenant');

        $permission->update([
           'permissions'=> json_encode([
               'read'=>$request['read']??false,
               'add'=>$request['add']??false,
               'update'=>$request['update']??false,
               'delete'=>$request['delete']??false,
           ])
        ]);

        return redirect()->back()->with('success','Permission successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $tenant
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($tenant, Permission $permission)
    {
        $this->authorize('delete', $permission);

        $permission->delete();

        return redirect()->back()->with('success','Permission successfully deleted');
    }
}
