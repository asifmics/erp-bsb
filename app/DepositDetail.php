<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositDetail extends Model
{
    public function gl_detail(){
        return $this->belongsTo('App\GlAccount', 'gl_id');
    }
}
