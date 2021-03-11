<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $fillable = [
        'user_id', 'name', 'logo', 'sliders	', 'address','facebook', 'google', 'twitter', 'youtube', 'slug','meta_title', 'meta_description', 'pick_up_point_id', 'shipping_cost'
    ];


  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
