<?php

namespace App;

use Hashids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_roles_id',
        'username',
        'email',
    ];

    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }
}
