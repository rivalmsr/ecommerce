@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-12">
          <div class="card">

            <div class="card-body">
              <h2>Produk</h2>
              <div class="">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary" > <strong>+</strong>Tambah Produk</a>
              </div>

              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <thead class="thead-dark">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ?>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ strip_tags($product->description) }}</td>
                      <td class="text-center" >

                        <a href="{{ route('admin.products.edit', $product->id) }}">
                          <button type="button" class="">
                            <img src="{{ asset('icons/svg/si-glyph-edit.svg') }}" width="14px" height="14px"/>
                          </button>
                        </a>

                        <a href="{{ route('admin.products.show', $product->id) }}">
                          <button type="button" class="">
                            <img src="{{ asset('icons/svg/si-glyph-view.svg') }}" width="14px" height="14px"/>
                          </button>
                        </a>

                        <a href="{{ route('admin.products.show', $product->id) }}">
                          <button type="button" class="">
                            <img src="{{ asset('icons/svg/si-glyph-image.svg') }}" width="14px" height="14px"/>
                          </button>
                        </a>

                        <form class="" action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                          {{ csrf_field() }}
                          @method('DELETE')

                          <button type="submit" name="button">
                            <img src="{{ asset('icons/svg/si-glyph-trash.svg') }}" width="14px" height="14px"/>
                          </button>
                        </form>

                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  @endsection
  
