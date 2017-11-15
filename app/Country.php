<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the states for the country.
     */
    public function states()
    {
        return $this->hasMany('App\Stated');
    }

    /**
     * Get the location for the country.
     */
    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
