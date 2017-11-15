<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $fillable = [
        'city_id',
    ];

    /**
     * Get the state that owns the location.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the state that owns the location.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Get the city that owns the location.
     */
    public function city()
    {
        return $this->belongsTo('App\city');
    }

    /**
     * Get the user that owns the phone.
     */
    public function locationData()
    {
        return $this->belongsTo('App\LocationData');
    }




}
