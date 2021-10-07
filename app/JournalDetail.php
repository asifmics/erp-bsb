<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{
    public function gl_info(){
        return $this->belongsTo('App\GlAccount', 'gl_id');
    }

    public function journal_info(){
        return $this->belongsTo('App\Journal', 'journal_id');
    }


}
