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

  // count views
  public function incrementsView($id){
    $query = "UPDATE products SET views = views + 1 WHERE id = $id ";
    return DB::select($query);
  }

  // Admin Product
  public function getUserId(){
    return $products = DB::table('products')
                    ->select('products.*')
                    ->where('products.user_id','=', Auth::user()->id)
                    ->get();
  }

  public function orderAdminProducts($order_by){
    // default products
    $id = Auth::user()->id;
    $query = "SELECT * FROM products WHERE user_id = $id ORDER BY created_at DESC";

    if($order_by == 'best_seller'){
      $query = "SELECT p.*, oi.quantity FROM products AS p
      LEFT JOIN (SELECT product_id, SUM(quantity) AS quantity FROM order_items
      GROUP BY product_id ) AS oi ON oi.product_id = p.id ORDER BY oi.quantity DESC";
    }else if ($order_by ==  'terbaik'){
      $query = "SELECT p.*, oi.rating FROM products AS p
      LEFT JOIN (SELECT product_id, AVG(rating) AS rating FROM product_reviews
      GROUP BY product_id ) AS oi ON oi.product_id = p.id ORDER BY oi.rating DESC";
    }else if($order_by == 'termurah'){
      $query = "SELECT * FROM products WHERE user_id = $id ORDER BY price ASC";
    }else if($order_by == 'termahal'){
      $query = "SELECT * FROM products WHERE user_id = $id ORDER BY price DESC";
    }else if($order_by == 'terbaru'){
      $query = "SELECT * FROM products WHERE user_id = $id ORDER BY created_at DESC";
    }
    else if($order_by == 'views'){
      $query = "SELECT * FROM products WHERE user_id = $id ORDER BY views DESC";
    }

    return DB::select($query);
  }


  public function user()
  {
    return $this->belongsTo('App\Models\ProductReview');
  }

  // All Products
  public function orderProducts($order_by){
    // default products
    $query = "SELECT * FROM products ORDER BY created_at DESC";

    if($order_by == 'best_seller'){
      $query = "SELECT p.*, oi.quantity FROM products AS p
      LEFT JOIN (SELECT product_id, SUM(quantity) AS quantity FROM order_items
      GROUP BY product_id ) AS oi ON oi.product_id = p.id ORDER BY oi.quantity DESC";
    }else if ($order_by ==  'terbaik'){
      $query = "SELECT p.*, oi.rating FROM products AS p
      LEFT JOIN (SELECT product_id, AVG(rating) AS rating FROM product_reviews
      GROUP BY product_id ) AS oi ON oi.product_id = p.id ORDER BY oi.rating DESC";
    }else if($order_by == 'termurah'){
      $query = "SELECT * FROM products ORDER BY price ASC";
    }else if($order_by == 'termahal'){
      $query = "SELECT * FROM products ORDER BY price DESC";
    }else if($order_by == 'terbaru'){
      $query = "SELECT * FROM products ORDER BY created_at DESC";
    }else if($order_by == 'views'){
      $query = "SELECT * FROM products ORDER BY views DESC";
    }

    return DB::select($query);
  }

}
