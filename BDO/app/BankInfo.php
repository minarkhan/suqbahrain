<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    protected $fillable = [
        'user_id',
        'ac_holder',
        'ac_no',
        'bank_name',
        'iban_number',
        'address',
        'routing_no'
    ];
}
