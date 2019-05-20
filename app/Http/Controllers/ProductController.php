<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Image;
use Auth;

class ProductController extends Controller
{
  public function __construct(){
    $this->product = new Product();
    $this->productReview = new ProductReview();
  }

  public function index(){
    $products = Product::all();
      return view('products.index', compact('products'));
  }

  public function show($id){
    $data['product'] = $this->product::find($id);
    $data['productReviews'] = $this->productReview->getProductReview($id);
    $data['avgRating'] = $this->productReview->getProductRating();

    if($data){
      return view('products.show', $data, compact('product'));
    }else{
      return redirect('/products')->with('erros','Produk tidak ditemukan !');
    }
  }

  public function image($imageName){
    $filePath = public_path(env('PATH_IMAGE').'products/'.$imageName);
    return Image::make($filePath)->response();

  }

  public function productRating(Request $request, $id){
    $rating = new ProductReview();
    $rating->user_id = Auth::user()->id;
    $rating->product_id = $id;
    $rating->rating = $request->post('rating');
    $rating->comment = $request->post('comment');
    $rating->save();
    return redirect()->route('products.show', ['id' => $id])->with('success', 'Produk berhasil disimpan !');
  }
}
