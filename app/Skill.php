<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
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
     * The job offers that belong to the skill.
     */
    public function jobOffers()
    {
        return $this->belongsToMany('App\JobOffer');
    }
}
