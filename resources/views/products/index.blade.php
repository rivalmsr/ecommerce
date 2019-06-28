@extends('layouts.home')
  @section('content')
    <div>
      <div class="row mt-4">
        <div class="col-md-4 offset-md-8">
          <div class="form-group">
            <select id="order_field" class="form-control" >
              <option value="" disabled selected>Urutkan</option>
              <option value="views">Views</option>
              <option value="best_seller">Best Seller</option>
              <option value="terbaik">Terbaik (Berdasarkan Rating)</option>
              <option value="termurah">Termurah</option>
              <option value="termahal">Termahal</option>
              <option value="terbaru">Terbaru</option>
            </select>
          </div>
        </div>
      </div>

      <div id="product-list">
        @foreach($products as $idx => $product)
        @if($idx == 0 | $idx % 4 == 0)
        <div class="row mt-2">
          @endif
          <div class="col-md-3">
            <div class="card shadow">
              @if(!empty($product))
              <img src="{{ url('/image_files/'.$product->image_url) }}" class="card-img-top rounded" alt="" height="160px">
              @endif
              <div class="card-body">
                <h5 class="card-title">
                  <a href="{{ route('products.show', ['id'=> $product->id]) }}">
                    {{ $product->name }}
                  </a>
                </h5>

                <p class="card-text">
                  Rp {{ number_format($product->price,0,',','.') }}
                </p>
                <p class="card-text">
                  Views : {{ $product->views }}
                </p>
                <a href="{{ route('carts.add',['id' => $product->id]) }}" class="btn btn-block btn-primary">Beli</a>
              </div>
            </div>

          </div>
          @if($idx > 0 && $idx %4 ==3)
        </div>
        @endif
        @endforeach

      </div>

      {{ $products->links() }}

    </div>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#order_field').change(function(){
          // window.location.href = '/products?order_by='+ $(this).val();

            $.ajax({
              type:'GET',
              url:'/products',
              data:{
                  order_by: $(this).val(),
              },
              dataType:'json',
              success:function(data){
                  var products ='';
                  $.each(data,function(idx,product){
                      if(idx == 0 || idx % 4 == 0){
                          products += '<div class="row mt-4">';
                      }
                      products += '<div class="col-md-3">'+
                      '<div class="card">'+'<img src="/image_files/'+ product.image_url+'" class="card-img-top" alt="..." height="160px">'+
                      '<div class="card-body">'+
                          '<h5 class="card-title">'+
                              '<a href="/products/'+product.id+'">'+
                              product.name+
                              '</a>'+
                          '</h5>'+
                          '<p class="card-text"> Rp.'+
                          product.price+
                          '</p>'+
                          '<p class="card-text"> Views : '+
                          product.views+
                          '</p>'+
                          '<a href="/carts/add'+product.id+'" class="btn btn-primary">Beli</a>'+
                      '</div>'+
                  '</div>'+
              '</div>';
              if(idx > 0 && idx % 4 == 3){
                  products += '</div>';
                  }
              });

          // update element
          $('#product-list').html(products);
              },
              error:function(data){
                  alert('Unable to handle request');
              }
          });
        });
      });
    </script>
  @endsection
