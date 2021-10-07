<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountGroup extends Model
{
    public function parentGroup(){
        return $this->belongsTo('App\AccountGroup', 'parent_id')->withDefault();
    }

    public function classDetails(){
        return $this->belongsTo('\App\AccountClass', 'class_id')->withDefault();
    }

    public function childGroup(){
        return $this->hasMany('App\AccountGroup', 'parent_id');
    }

    public function glAccounts(){
        return $this->hasMany('App\GlAccount', 'group_id');
    }
}
