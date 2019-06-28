<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
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

  public function index(Request $request){
    $title = "Home";
    $page = "Home";
    $data['title'] = $title;
    $data['page'] = $page;
    $productInstance = new Product();
    $products = $productInstance->orderProducts($request->get('order_by'));

    if($request->ajax()){
      return response()->json($products, 200);
    }

    $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($products);
        $perPage = 8;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());
      return view('products.index', $data, ['products' => $paginatedItems]);
  }

  public function show($id){
    // review count
    // $this->product->IncrementsView($id);

    $title = "Produk Review";
    $page = "Produk Review";

    $data['title']= $title;
    $data['page'] = $page;
    $data['product'] = $this->product::find($id);
    $data['productReviews'] = $this->productReview->getProductReview($id);
    $data['avgRating'] = $this->productReview->getProductRating($id);

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
