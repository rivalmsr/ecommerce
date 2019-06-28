<?php /* /home/rivalmsr/Documents/rdeveloper/laravel/ecommerce-adminLTE/resources/views/admin/products/index.blade.php */ ?>
  <?php $__env->startSection('content'); ?>
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

              <form role="form" action="<?php echo e(route('admin.products.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

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
              <div class="row">
                <div class="col-md-4">
                  <h3 class="card-title">List Produk</h3>
                </div>
                <div class="col-md-8">
                  <div class="col-md-4 offset-md-8">
                    <div class="form-group">
                      <select id="order_field" class="form-control" >
                        <option value="" disabled selected>Urutkan</option>
                        <option value="best_seller">Best Seller</option>
                        <option value="terbaik">Terbaik (Berdasarkan Rating)</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                        <option value="terbaru">Terbaru</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="product-list">
                  <?php
                    $no = 1;
                  ?>

                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                      <td><?php echo e($no++); ?></td>
                      <td><?php echo e($product->name); ?></td>
                      <td>Rp <?php echo e(number_format($product->price,0,',','.')); ?></td>
                      <td>
                        <span class="d-inline-block text-truncate" style="max-width: 400px;">
                        <?php echo e(strip_tags($product->description)); ?>

                      </span>
                      </td>
                      <td class="text-center" >
                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php echo e(route('admin.products.show', $product->id)); ?>" class="btn btn-info btn-sm">Show</a>
                        <a href="<?php echo e(route('admin.products.destroy', $product->id)); ?>" class="btn btn-danger btn-sm" method="delete">Delete</a>
                      </td>
                    </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      // $(document).ready(function(){
      //   $('#order_field').change(function(){
      //     // window.location.href = '/products?order_by='+ $(this).val();
      //
      //       $.ajax({
      //         type:'GET',
      //         url:'/admin/products',
      //         data:{
      //             order_by: $(this).val(),
      //         },
      //         dataType:'json',
      //         success:function(data){
      //             var products ='';
      //             var no = 1;
      //             $.each(data,function(idx, product){
      //                 products += '<tr>'+
      //                 '<td>'+ no++ +'</td>'+
      //                 '<td>'+ product.name +'</td>'+
      //                 '<td>'+ product.price +'</td>'+
      //                 '<td class=" text-truncate" style="max-width: 350px;">'+ product.description +'</td>'+
      //                 '<td class="text-center">'+
      //                  '<a href="/admin/products/'+product.id+'/edit" class="btn btn-warning btn-sm">Edit</a>'+
      //                  '<a href="/admin/products/'+product.id+'" class="btn btn-info btn-sm" style="margin: 0px 2px 0px 2px;">Show</a>'+
      //                  '<a href="/admin/products/'+product.id+'" class="btn btn-danger btn-sm">Delete</a>'+
      //                 '</td>'+
      //               '</tr>';
      //         });
      //
      //         $('#product-list').html(products);
      //     // update element
      //         },
      //         error:function(data){
      //             alert('Unable to handle request');
      //         }
      //     });
      //   });
      // });
    </script>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.core', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>