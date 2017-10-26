<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_name', 'legal_repre', 'type_company',
        'hierarchy', 'economic_activity', 'num_workers',
        'nature',
    ];

    /**
     * Get the user that owns the BasicData.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
