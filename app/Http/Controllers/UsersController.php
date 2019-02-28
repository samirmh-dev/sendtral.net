<?php

namespace App\Http\Controllers;

use App\Notifications\VerifyEmail;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('read', User::class);

        return view('dashboard.security.users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        \DB::setDefaultConnection('tenant');

        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'role'=>'required|exists:roles,slug',
            'password'=>['required', 'string', 'min:6', 'confirmed', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']
        ]);

        $user = User::create([
           'fullname'=>$request['name'],
           'email'=>$request['email'],
           'password'=>Hash::make($request['password']),
        ]);

        $user->notify(new VerifyEmail(session('tenant')));

        $user->roles()->attach(Role::whereSlug($request['role'])->get()->first()->id);

        return redirect()->back()->with('success','New user registered successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, $id, User $user)
    {
        $this->authorize('update', $user);

        \DB::setDefaultConnection('tenant');

        $request->validate([
            'name'=>'required|string',
            'role'=>'required|exists:roles,slug',
        ]);

        $update = [
            'fullname'=>$request['name']
        ];

        $user->roles()->detach();

        if($request['email'] !== $user->email){
            $update['email_verified_at']=null;
            $update['email']=$request['email'];
            $user->notify(new VerifyEmail(session('tenant')));
        }

        $user->update($update);

        $user->roles()->attach(Role::whereSlug($request['role'])->get()->first()->id);

        return redirect()->back()->with('success','User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $tenant
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy($tenant, User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('tenant:users.index',['tenant'=>session('tenant')])->with('success','User was deleted successfully');
    }
}
