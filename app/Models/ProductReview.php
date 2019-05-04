<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
  protected $fillable = [
    'user_id', 'product_id', 'description', 'rating'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
