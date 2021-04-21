<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReturn extends Model
{
    protected  $table = 'product_returns';

    protected $fillable = [
        'image',
        'user_id',
        'order_id',
        'reason',
        'image',
    ];
}
