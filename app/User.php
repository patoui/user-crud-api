<?php

namespace App;

use Hashids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * Definition of what gets return by toArray which includes API responses
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->encoded_id,
            'username' => $this->username,
            'email' => $this->email,
            'role' => $this->role_label,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'short_updated_at' => $this->short_updated_at,
        ];
    }
}
