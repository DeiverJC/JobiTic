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

    /**
     * Get the location record associated with the job offer.
     */
    public function location()
    {
        return $this->hasOne('App\Location');
    }

    /**
     * The skills that belong to the job offer.
     */
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }


}
