<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the contry that owns the state.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the cities for the state.
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }

    /**
     * Get the location for the state.
     */
    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
