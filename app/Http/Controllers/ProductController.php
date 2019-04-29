<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Image;

class ProductController extends Controller
{
  public function __construct(){

  }

  public function index(){
    $products = Product::all();
    // var_dump($products);
    // die();
      return view('products.index', compact('products'));
  }

  public function show($id){
    $product = Product::find($id);
    if($product){
      return view('products.show', compact('product'));
    }else{
      return redirect('/products')->with('erros','Produk tidak ditemukan !');
    }
  }

  public function image($imageName){
    $filePath = public_path(env('PATH_IMAGE').'products/'.$imageName);
    return Image::make($filePath)->response();

  }
}
