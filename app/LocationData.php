<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country', 'departament', 'municipality', 'address',
        'phone_indic', 'phone_num', 'phone_ext',
        'phone2_indic', 'phone2_num', 'phone2_ext',
        'celphone', 'website'
    ];

    /**
     * Get the user that owns the LocarionData.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
