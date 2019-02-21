<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLogs extends Model
{
    protected $connection = 'tenant';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
