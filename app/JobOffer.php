<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'type_offer',
        'offer_country',
        'offer_city',
        'remote',
        'salary_from',
        'salary_until',
        'cunrrency',
        'type_salary',
        'description',
        'restrictions',
    ];

    /**
     * Get the user that owns the job offer.
     */
    public function user()
    {
        return $this->belongTo('App\User');
    }


}
