<?php

namespace App\Policies;

use App\Role;
use App\Tenant;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function read(User $user) {
        return $user->hasAccess('roles','read');
    }

    public function create(User $user) {
        return $user->hasAccess('roles','add');
    }

    public function update(User $user) {
        return $user->hasAccess('roles','update');
    }

    public function delete(User $user) {
        return $user->hasAccess('roles','delete');
    }
}
