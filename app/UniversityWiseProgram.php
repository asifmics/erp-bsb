<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityWiseProgram extends Model{

    public function programName(){
        return $this->belongsTo('App\UniversityProgram','program','id');
    }

    public function CategoryName(){
        return $this->belongsTo('App\UniversityProgramCategory','category','id');
    }

}
