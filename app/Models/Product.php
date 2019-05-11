<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;


class Product extends Model
{
  protected $fillable = [
    'name', 'price', 'description','image_url',
  ];

  public function getUserId(){
    return $products = DB::table('products')
                    ->select('products.*')
                    ->where('products.user_id','=', Auth::user()->id)
                    ->get();
  }

  public function user()
  {
    return $this->belongsTo('App\Models\ProductReview');
  }

}
