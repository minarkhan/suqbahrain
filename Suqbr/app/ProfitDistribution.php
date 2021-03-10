<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitDistribution extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'deposit_amount',
    ];

}
