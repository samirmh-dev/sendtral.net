<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'tenant';

    protected $fillable = [
        'name', 'slug', 'permissions','description'
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    protected $dates = ['created_at'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class,'role_id');
    }

    public function hasAccess($permission, $action) : bool
    {
        if ($this->hasPermission($permission, $action))
            return true;
        return false;
    }

    private function hasPermission(string $permission, $action) : bool
    {
        return json_decode($this->permissions()->wherePage($permission)->get()->first()->permissions)->$action ?? false;
    }
}
