<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public function getTtype()
    {
        switch ($this->type) {
            case 0:
                return 'Savings Account';
                break;
            case 1:
                return 'Current Account';
                break;
            case 2:
                return 'Credit Account';
                break;
            case 3:
                return 'Cash Account';
                break;
        }
    }

    public function accountGl()
    {
        return $this->belongsTo('App\GlAccount', 'account_gl_id')->withDefault();
    }

    public function chargeGl()
    {
        return $this->belongsTo('App\GlAccount', 'charge_gl_id')->withDefault();
    }
}
