<?php

namespace App\Http\Controllers;

use App\Role;
use App\Services\TenantManager;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    public function __construct(TenantManager $tenantManager)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('read', Role::class);

        return view('dashboard.security.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Role::class);

        return view('dashboard.security.roles.create');
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
            'permissions' => 'required|array',
            'permissions.*' => 'required|array',
            'permissions.*.read' => 'required|accepted',
            'permissions.*.add' => 'sometimes|required|accepted',
            'permissions.*.update' => 'sometimes|required|accepted',
            'permissions.*.delete' => 'sometimes|required|accepted',
        ]);

        if(Role::whereSlug(Str::slug($request['name']))->get()->first())
            return back()->withInput()->with('warning','This role name already exists');

        $permissions = json_encode($request['permissions']);

        Role::create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'permissions' => $permissions
        ]);

        return redirect()->route('tenant:roles.index',['tenant'=>session('tenant')])->with('success','New role was created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $tenant
     * @param Role $role
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($tenant, Role $role)
    {
        $this->authorize('update', $role);
        return view('dashboard.security.roles.edit',['role'=>$role]);
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
            'permissions' => 'required|array',
            'permissions.*' => 'required|array',
            'permissions.*.read' => 'required|accepted',
            'permissions.*.add' => 'sometimes|required|accepted',
            'permissions.*.update' => 'sometimes|required|accepted',
            'permissions.*.delete' => 'sometimes|required|accepted',
        ]);

        $permissions = json_encode($request['permissions']);

        $role->name = $request['name'];

        $role->slug = Str::slug($request['name']);

        $role->permissions = $permissions;

        $role->save();

        return redirect()->route('tenant:roles.index',['tenant'=>session('tenant')])->with('success','Role was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tenant, Role $role)
    {
        $this->authorize('update', $role);

        $role->delete();

        return redirect()->route('tenant:roles.index',['tenant'=>session('tenant')])->with('success','Role was deleted successfully');
    }
}
