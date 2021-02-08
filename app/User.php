<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Soft Deletes
    use SoftDeletes;

    // Soft Deletes
    protected $dates = ['deleted_at'];

    // imagens
    public function imagens() {
        // One-to-Many
        return $this->hasMany('App\imagens');
    }

    protected $fillable = [
        'name', 'email', 'password', 'profile'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
