<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //------------Start Relationship------------

    /**
     * Get the BasicData record associated with the user.
     */
    public function basicData()
    {
        return $this->hasOne('App\BasicData');
    }

    /**
     * Get the ContactInfo record associated with the user.
     */
    public function locationData()
    {
        return $this->hasOne('App\LocationData');
    }

    /**
     * Get the ContactInfo record associated with the user.
     */
    public function contactInfo()
    {
        return $this->hasOne('App\ContactInfo');
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    //------------End Relationship------------

    /*public function hasInfo()
    {
        $data = Auth::user()->basicData()->get();

        return $data;

    }*/

    //------------Start functions roles------------

    public function authorizeRoles($roles)
    {
        if ( $this->hasAnyRole($roles) ) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles)
    {
        if ( is_array($roles) ) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    //------------End functions roles------------

}
