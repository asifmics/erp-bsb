<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
   public function student()
   {
      return $this->hasMany('App\Student','ref_by');
   }
}
