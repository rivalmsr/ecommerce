<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Image;
use App\User;
use Auth;

class ProductController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
      $this->model = new Product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = $this->model->getUserId();
      return view('admin.products.index', compact('products'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required|max:225',
        'price'=>'required|numeric',
        'description'=>'required'
      ]);
      // upload images
      $file = $request->file('image_url');
      $ext = $file->getClientOriginalExtension();

      $dateTime = date('Ymd_his');
      $newName = 'image_'.$dateTime.'.'.$ext;
      $file->move(public_path(env('PATH_IMAGE')),$newName);

      // save database
      $product = new Product();
      $product->user_id = Auth::user()->id;
      $product->name = $request->post('name');
      $product->price = $request->post('price');
      $product->description = $request->post('description');
      $product->image_url = $newName;

      $product->save();
      return redirect()->route('admin.products.index')->with('success', 'Produk berhasil disimpan !');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::where('id', $id)->get();
      return view('admin.products.show', ['products'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::where('id', $id)->get();
      return view('admin.products.edit', ['products'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $prod_update = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'description' => 'required'
      ]);

      Product::whereId($id)->update($prod_update);
      return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::where('id', $id)->delete();
      return redirect()->route('admin.products.index');
    }
}
