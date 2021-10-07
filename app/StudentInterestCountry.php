<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInterestCountry extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }
    public function university()
    {
        return $this->belongsTo('App\University','university_id');
    }
    public function coursecategory()
    {
        return $this->belongsTo('App\UniversityProgramCategory','university_program_category_id');
    }
    public function course()
    {
        return $this->belongsTo('App\UniversityProgram','university_program_id');
    }
}
