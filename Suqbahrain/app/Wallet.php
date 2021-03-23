<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        '',
        'user_id',
        'amount',
        'payment_method',
        'payment_details',
        'approval',
        'offline_payment',
        'reciept',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
