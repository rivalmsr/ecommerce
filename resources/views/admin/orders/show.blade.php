@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <div class="row">
            <div class="col">
              <h2>
                <span class="badge badge-primary" >Alamat Pengiriman</span>
               </h2>
               <p>{{$order->shipping_address}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <h2>
                <span class="badge badge-primary">Kode Pos</span>
              </h2>
              <p>{{$order->zip_code}}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h2>
              <span class="badge badge-primary">Harga Total</span>
            </h2>
            <p>{{$order->total_price}}</p>
          </div>
        </div>
      </div>
    </div>
  @endsection
