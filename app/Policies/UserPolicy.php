<?php

namespace App\Policies;

use App\Role;
use App\Tenant;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
        return $user->hasAccess('users','read');
    }

    public function create(User $user) {
        return $user->hasAccess('users','add');
    }

    public function update(User $user) {
        return $user->hasAccess('users','update');
    }

    public function delete(User $user) {
        return $user->hasAccess('users','delete');
    }
}
