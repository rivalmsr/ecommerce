<?php /* /home/rivalmsr/Documents/rdeveloper/laravel/ecommerce-adminLTE/resources/views/products/index.blade.php */ ?>
  <?php $__env->startSection('content'); ?>
    <div>
      <div class="row mt-4">
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
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($idx == 0 | $idx % 4 == 0): ?>
            <div class="row mt-2">
              <?php endif; ?>
              <div class="col-md-3">
                <div class="card shadow">
                  <?php if(!empty($product)): ?>
                  <img src="<?php echo e(url('/image_files/'.$product->image_url)); ?>" class="card-img-top rounded" alt="" >
                  <?php endif; ?>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="<?php echo e(route('products.show', ['id'=> $product->id])); ?>">
                        <?php echo e($product->name); ?>

                      </a>
                    </h5>
                    <p class="card-text">
                      Rp <?php echo e(number_format($product->price,0,',','.')); ?>

                    </p>
                    <a href="<?php echo e(route('carts.add',['id' => $product->id])); ?>" class="btn btn-block btn-primary">Beli</a>
                  </div>
                </div>

              </div>
              <?php if($idx > 0 && $idx %4 ==3): ?>
            </div>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#order_field').change(function(){
          window.location.href = '/products?order_by='+ $(this).val();
        });
      });
    </script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>