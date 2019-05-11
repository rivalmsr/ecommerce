<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductReview extends Model
{
  protected $fillable = [
    'user_id', 'product_id', 'comment', 'rating'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function getProductReview($id){
    return $productReviews = DB::table('product_reviews')
                            ->join('products', 'product_reviews.product_id','=','products.id' )
                            ->select('products.id','product_reviews.*')
                            ->where('products.id', '=', $id)
                            ->orderBy('product_reviews.created_at', 'desc')
                            ->get();
  }
}
