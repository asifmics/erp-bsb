<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlAccount extends Model
{
    public function getStatusAttribute($value){
        return $value ? 'Active' : 'Inactive';
    }

    public function groupDetails(){
        return $this->belongsTo('App\AccountGroup', 'group_id')->withDefault();
    }
}
