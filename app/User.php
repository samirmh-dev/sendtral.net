<?php

namespace App;

use App\Notifications\ResetPassword;
use App\Services\TenantManager;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $connection = 'tenant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function route($name, $parameters = []) {
        return 'http://' . $this->subdomain .'.'. app('url')->route($name, $parameters, false);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerifyEmail);
    }

    public function tenant()
    {
        return Tenant::whereSlug(session('tenant'))->get()->first()->toArray();
    }

    public function access_logs()
    {
        return $this->hasMany(AccessLogs::class,'user_id');
    }
}
