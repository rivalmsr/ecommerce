@extends('layouts.core')
  @section('content')
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-info collapsed-card card-outline">
            <div class="card-header">
              <h3 class="card-title">Tambah Produk</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form role="form" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label >Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name">
                  </div>
                  <div class="form-group">
                    <label >Harga</label>
                    <input type="text" class="form-control" placeholder="Harga" name="price">
                  </div>
                  <div class="form-group">
                    <label >Upload Foto</label>
                    <input type="file" class="form-control" name="image_url">
                  </div>
                  <label>Deskripsi</label>
                    <textarea id="editor1" name="description" style="width: 100%"></textarea>
                    <div class="form-group">
                  </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Produk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;

                  @endphp
                  @foreach($products as $product)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price,0,',','.') }}</td>
                    <td>
                      <span class="d-inline-block text-truncate" style="max-width: 400px;">
                      {{ strip_tags($product->description) }}
                    </span>
                    </td>
                    <td class="text-center" >
                      <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
                      <a href="{{ route('admin.products.destroy', $product->id) }}" class="btn btn-danger btn-sm" method="delete">Delete</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->

    </div>
  @endsection
