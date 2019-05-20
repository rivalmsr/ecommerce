@extends('layouts.home')
  @section('content')
    <div>
        @foreach($products as $idx => $product)
            @if($idx == 0 | $idx % 4 == 0)
            <div class="row mt-2">
              @endif
              <div class="col-md-3">
                <div class="card shadow">
                  @if(!empty($product))
                  <img src="{{ url('/image_files/'.$product->image_url) }}" class="card-img-top rounded" alt="" >
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="{{ route('products.show', ['id'=> $product['id']]) }}">
                        {{ $product->name }}
                      </a>
                    </h5>
                    <p class="card-text">
                      {{ $product->price }}
                    </p>
                    <a href="{{ route('carts.add',['id' => $product['id']]) }}" class="btn btn-block btn-primary">Beli</a>
                  </div>
                </div>

              </div>
              @if($idx > 0 && $idx %4 ==3)
            </div>
            @endif
          @endforeach
    </div>
  @endsection
