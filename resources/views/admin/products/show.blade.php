@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="{{ route('admin.products.image', ['imageName'=>$product['image_url']])}}" class="card-img-top" alt="">
        </div>

        <div class="col-md-9">
          <h3>
            {{ $product->name }}
          </h3>
          <h4>
            {{ $product->price }}
          </h4>
          <div class="mt-4">
            <a href="#" class="btn btn-primary">Beli</a>
          </div>
          <div class="mt-4">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#description" role="tab" data-toggle="tab">description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#review" role="tab" data-toggle="tab">Review</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-2">
              <div role="tabpanel" class="tab-pane fade in active show" id="description">
                {!! $product->description !!}
              </div>
              <div class="tabpanel" class="tab-pane fade" id="review">
                Content untuk review disini
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  @endsection