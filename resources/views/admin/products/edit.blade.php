@extends('layouts.core')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Edit Produk</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @foreach($products as $product)
              <form role="form" action="{{ route('admin.products.update', $product['id']) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PATCH')

                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="name" class="form-control" placeholder="Nama Produk" value="{{ $product['name'] }}" required>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" name="price" class="form-control" placeholder="Harga Produk" value="{{ $product['price'] }}" required>
                </div>

                  <label>Deskripsi</label>
                    <textarea id="editor1" name="description" style="width: 100%">{{ $product['description'] }}</textarea>
                    <div class="form-group">
                  </div>
                  <div class="form-group text-right">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Back</a>
                    <button type="submit" class="btn btn-primary" name="button">Submit</button>
                  </div>
              </form>
              @endforeach
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
    </div>
  @endsection
