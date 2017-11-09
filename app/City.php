<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'state_id',
    ];

    /**
     * Get the state that owns the city.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Get the location record associated with the city.
     */
    public function location()
    {
        return $this->hasOne('App\location');
    }
}
