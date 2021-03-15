<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'user_id',
        'withdraw_amount',
        'status',
        'bank_info_id',
        'status',
        'agree_term',
        'withdraw_amount'
    ];

    public function bankinfo(){
        return $this->belongsTo(BankInfo::class, 'bank_info_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

