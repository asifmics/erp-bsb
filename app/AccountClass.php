<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountClass extends Model
{
    public function groupDetails(){
        return $this->hasMany('App\AccountGroup', 'class_id')
        ->where(function ($query) {
            $query->whereNull('parent_id');
        });
    }
}
