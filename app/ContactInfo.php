<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surnames', 'position', 'email',
        'phone_indic_hr', 'phone_num_hr', 'phone_ext_hr',
        'phone2_indic_hr', 'phone2_num_hr', 'phone2_ext_hr'
    ];

    /**
     * Get the user that owns the ContactInfo.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
