<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdraw extends Model
{
    protected $fillabl = [
        'user_id',
        'withdraw_amount',
        'status'
    ];
}
