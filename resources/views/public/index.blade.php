@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">

            <div class="card-body">
              <h2>Produk</h2>
              <!-- <div class="">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary" > <strong>+</strong>Tambah Produk</a>
              </div> -->

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
                      <td>
                        <span class="d-inline-block text-truncate" style="max-width:300px;">
                          {{ strip_tags($product->description) }}
                        </span>
                      </td>

                      <td class="text-center" >
                        <a href="{{ route('public.products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
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
