<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityProgram extends Model{
    
    public function proCate(){
        return $this->belongsTo('App\UniversityProgramCategory','category','id');
    }
}
