<?php

namespace App\Http\Controllers;

use App\Role;
use App\Services\TenantManager;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('read', Role::class);

        return view('dashboard.security.roles');
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
        $this->authorize('create', Role::class);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:100',
//            'permissions' => 'required|array',
//            'permissions.*' => 'required|array',
//            'permissions.*.read' => 'required|accepted',
//            'permissions.*.add' => 'sometimes|required|accepted',
//            'permissions.*.update' => 'sometimes|required|accepted',
//            'permissions.*.delete' => 'sometimes|required|accepted',
        ]);

        if(Role::whereSlug(Str::slug($request['name']))->get()->first())
            return back()->withInput()->with('warning','This role name already exists');

        $permissions = json_encode($request['permissions']);

        Role::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'slug' => Str::slug($request['name']),
//            'permissions' => $permissions
        ]);

        return redirect()->route('tenant:roles.index',['tenant'=>session('tenant')])->with('success','New role was created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $tenant, Role $role)
    {
        $this->authorize('update', $role);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:100',
//            'permissions' => 'required|array',
//            'permissions.*' => 'required|array',
//            'permissions.*.read' => 'sometimes|required|accepted',
//            'permissions.*.add' => 'sometimes|required|accepted',
//            'permissions.*.update' => 'sometimes|required|accepted',
//            'permissions.*.delete' => 'sometimes|required|accepted',
        ]);

//        $permissions = $request['permissions'];

//        foreach($permissions as $key=>$permission)
//            if(!array_key_exists('read',$permission))
//                unset($permissions[$key]);

//        $permissions = json_encode($permissions);

        $role->name = $request['name'];
        $role->description = $request['description'];

        $role->slug = Str::slug($request['name']);

//        $role->permissions = $permissions;

        $role->save();

        return redirect()->route('tenant:roles.index',['tenant'=>session('tenant')])->with('success','Role was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $tenant
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($tenant, Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('tenant:roles.index',['tenant'=>session('tenant')])->with('success','Role was deleted successfully');
    }
}
