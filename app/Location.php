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
     * Get the city that owns the location.
     */
    public function city()
    {
        return $this->belongsTo('App\city');
    }
}
