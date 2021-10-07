<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    public function journal_items()
    {
        return $this->hasMany('App\JournalDetail', 'journal_id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'created_by')->withDefault();
    }
    public function updator(){
        return $this->belongsTo('App\User', 'updated_by')->withDefault();
    }
}
