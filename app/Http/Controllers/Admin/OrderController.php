<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;

class OrderController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // Menambah kondisi untuk memvalidasi kerajang belanja, kalau keranjang kerja ada, baru bisa bikin order
      $cart = session()->get('cart');
      if ($cart) {
        return view('admin.orders.create');
      }else {
        return redirect()->route('orders.index')->with('success', 'Anda harus belanja terlebih dahulu !');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate(request(), [
        'shipping_address' => 'required',
        'zip_code' => 'required'
      ]);

      //  Get total Price
      $cart = session()->get('cart');
      $total_price = 0;
      foreach ($cart as $id => $product) {
        $total_price += $product['price'] = $product['quantity'];
      }

      // Save order item
      foreach ($cart as $id => $product) {
        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $id;
        $orderItem->quantity = $product['quantity'];
        $orderItem->price = $product['price'];
        $orderItem->save();
      }

      // Remove chart Session
      session()->forget('cart');

      return redirect('admin/orders/'.$order->id->with('success', 'Order berhasil di simpan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
