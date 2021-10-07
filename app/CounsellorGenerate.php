<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CounsellorGenerate extends Model
{
    public function counsellor()
    {
       return $this->belongsTo('App\Employee','counsellor_id');
    }
    public function maincounsellor()
    {
       return $this->belongsTo('App\CounsellorGenerate','parent_id','id');
    }
    public function student()
    {
       return $this->hasMany('App\Student','counsellor');
    }
   
}
