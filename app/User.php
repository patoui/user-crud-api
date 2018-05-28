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

    protected $appends = ['short_updated_at', 'role_label', 'encoded_id'];

    protected $hidden = ['id', 'user_roles_id', 'role'];

    /**
     * Override getRouteKey to display encoded id
     *
     * @return string
     */
    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }

    /**
     * Short human friendly updated date
     *
     * @return string|null
     */
    public function getShortUpdatedAtAttribute()
    {
        return $this->updated_at
            ? $this->updated_at
                ->setTimezone('America/Toronto')
                ->format('F jS g:i A')
            : null;
    }

    /**
     * User's role label
     *
     * @return string|null
     */
    public function getRoleLabelAttribute()
    {
        return data_get($this, 'role.label');
    }

    /**
     * User's role
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'user_roles_id');
    }

    /**
     * Encoded id
     *
     * @return string
     */
    public function getEncodedIdAttribute()
    {
        return $this->getRouteKey();
    }
}
