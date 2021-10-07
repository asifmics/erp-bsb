<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternationalAgent extends Model
{
    protected $guarded;
    protected $dates = [];

    public function universities()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function certification()
    {
        return $this->belongsTo(CertificationAgent::class, 'certification_id');
    }


}
