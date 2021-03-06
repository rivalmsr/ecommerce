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
                            ->orderBy('created_at', 'desc')
                            ->get();
  }

  public function getProductRating($id){
    return $rating = DB::table('product_reviews')
                    ->where('product_reviews.product_id','=',$id)
                    ->avg('product_reviews.rating');
  }

  public function getProductRatingAll(){
    return $rating = DB::table('product_reviews')
                      ->where('product_reviews.product_id')
                      ->avg('product_reviews.rating');
  }
}
