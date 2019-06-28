<?php /* /home/rivalmsr/Documents/rdeveloper/laravel/ecommerce-adminLTE/resources/views/layouts/home.blade.php */ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo e($title); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/flat/blue.css')); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/morris/morris.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datepicker/datepicker3.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker-bs3.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--star icon in rating  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style media="screen">
      body{
      /* background-color: #F4F6F9; */
      }
      .jumbotron{
        background-image: url("<?php echo e(asset('img/book.jpg')); ?> ");
        background-size: cover;
        background-repeat: no-repeat;
      }
      .brand-ecommerce{
        color: #0abde3;
      }
      .btn-light{
        background-color: #e8ecf1;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="<?php echo e(route('admin.products.index')); ?>">
              <h5><?php echo e($title); ?></h5>
            </a>
          </div>
          <div class="col-4 text-center">
            <a class=" text-monospace font-weight-bold text-dark" href="<?php echo e(route('products.index')); ?>">
              <h1 class="brand-ecommerce">Space Book</h1>
            </a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <form class="p-2 form-inline my-2 my-lg-0" action="index.html" method="post">
              <input type="search" class="form-control form-control-sm mr-sm-2" name="" placeholder="Search">
              <button class="btn btn-outline-info btn-sm" type="submit" name="button">Search</button>
            </form>
          </div>
        </div>
      </header>

      <div class="border-top border-bottom mb-2">
        <nav class="navbar navbar-expand-md navbar-light">
          <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
                <?php if(Auth::check()): ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="<?php echo e(route('admin.products.index')); ?>">List</a>
                      <a class="dropdown-item" href="<?php echo e(route('products.index')); ?>">Products</a>
                      <a class="dropdown-item" href="<?php echo e(route('admin.products.create')); ?>">Tambah</a>
                      <!-- <a class="dropdown-item" href="<?php echo e(route('image.index')); ?>">Gambar</a> -->
                    </div>
                  </li>

                  <!-- Carts Nav -->
                  <li class="nav-item">
                    <a href="<?php echo e(route('carts.index')); ?>" class="btn btn-primary btn-block">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart
                      <span class="badge badge-pill badge-danger">
                        <?php if(session('cart')): ?>
                        <?php echo e(count(session('cart'))); ?>

                        <?php else: ?>
                        0
                        <?php endif; ?>
                      </span>
                    </a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Order</a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('admin.orders.index')); ?>">List Order</a>
                      </div>
                    </li>
                    <?php endif; ?>
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('admin.products.index')); ?>">Dashboard</a>
                    </li>
                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <?php if(Route::has('register')): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php else: ?>
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                      </a>

                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                      </form>
                    </div>
                  </li>
                  <?php endif; ?>
              </ul>
            </div>

          </div>
        </nav>
      </div>

      <?php if( $page == 'Home'): ?>
      <div class="jumbotron p-4 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
          <h1>Buku Jendela Duniamu</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
          <a class="btn btn-outline-light" href="#">Registrasi Akun</a>
        </div>
      </div>
      <?php else: ?>
      <?php endif; ?>

      <main>
        <?php echo $__env->yieldContent('content'); ?>
      </main>

    </div><br><br>

    <footer class="border-top" style="background-color:#e8ecf1;">
      <p class="text-center py-4">
        <strong>Copyright &copy; 2014-2018 <a href="#">BINARY Team</a>.</strong>
        All rights reserved.
      </p>
    </footer>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo e(asset('plugins/morris/morris.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('plugins/knob/jquery.knob.js')); ?>"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo e(asset('plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo e(asset('plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo e(asset('plugins/select2/select2.full.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('plugins/fastclick/fastclick.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('js/adminlte.js')); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('js/pages/dashboard.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('js/demo.js')); ?>"></script>
    <!-- CK Editor -->
    <script src="<?php echo e(asset('plugins/ckeditor/ckeditor.js')); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.js')); ?>"></script>

    <!-- Functions Table -->
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // ClassicEditor
        //   .create(document.querySelector('#editor1'))
        //   .then(function (editor) {
        //     // The editor instance
        //   })
        //   .catch(function (error) {
        //     console.error(error)
        //   })

        // bootstrap WYSIHTML5 - text editor

        // $('.textarea').wysihtml5({
        //   toolbar: { fa: true }
        // })

        // Function DataTable
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      })
    </script>
  </body>
</html>
