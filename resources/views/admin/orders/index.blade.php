@extends('layouts.core')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Harga Total</th>
                    <th>Status</th>
                    <th>Kode Pos</th>
                    <th>Alamat Pengiriman</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                    <tr>
                      <td>{{ $order['id'] }}</td>
                      <td>{{ $order['total_price'] }}</td>
                      <td>{{ $order['status'] }}</td>
                      <td>{{ $order['zip_code'] }}</td>
                      <td>{{ $order['shipping_address'] }}</td>
                      <td>
                        <a href="{{ route('admin.orders.show', ['id'=>$order['id']]) }}" class="btn btn-info btn-sm">Show</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Harga Total</th>
                  <th>Status</th>
                  <th>Kode Pos</th>
                  <th>Alamat Pengiriman</th>
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
    </div>
  @endsection
