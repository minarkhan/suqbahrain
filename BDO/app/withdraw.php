<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'user_id',
        'withdraw_amount',
        'bank_info_id',
        'status',
        'agree_term',
        'withdraw_amount'
    ];

    /**
     * Get the user that owns the withdraw
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bankinfo(){
        return $this->belongsTo(BankInfo::class, 'bank_info_id', 'id');
    }
}
