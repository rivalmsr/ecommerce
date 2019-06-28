  @extends('layouts.home')
  @section('content')
    <div class="bg-white rounded">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Detail Produk</h5>
            </div>
            <div class="card-body">

              <div class="row">

                <div class="col-md-3">
                  <img src="{{ url('/image_files/'.$product->image_url) }}" class="card-img-top" alt="">
                </div>

                <div class="col-md-9">
                  <div class="">
                    <h3>
                      {{ $product->name }}
                    </h3>

                    <p>
                      @php $rating = $avgRating ; @endphp
                      <div class="placeholder" style="color:lightgray;">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <span style="color:gray;">{{ round($rating,2) }}</span>
                      </div>

                      <div class="overlay" style="position: relative; top: -22px; color: yellow;">
                        @while($rating>0)
                        @if($rating > 0.5)
                        <i class="fas fa-star"></i>
                        @else
                        <i class="fas fa-star-half"></i>
                        @endif
                        @php $rating--; @endphp
                        @endwhile
                      </div>
                    </p>

                  </div>
                  <h4>
                    Rp {{ number_format($product->price,0,',','.') }}
                  </h4>
                  <h6>
                    views : {{ $product->views }}
                  </h6>

                  <div class="mt-4">
                    <a href="{{ route('carts.add', ['id'=> $product->id]) }}" class="btn btn-primary">Beli</a>
                  </div>

                  <div class="mt-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('products.show', ['id'=> $product->id]) }}" class="social-button" target="_blank">
                      Share Facebook
                    </a>
                    |
                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('products.show', ['id' => $product->id]) }}" class="social-button" target="_blank">
                      Share Twitter
                    </a>
                    |
                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' => $product->id]) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button" target="_blank">
                      Share Linkedin
                    </a>
                    |
                    <a href="https://wa.me/?text={{ route('products.show', ['id' => $product->id]) }}" class="social-button" target="_blank">
                      Share WhatsApp
                    </a>
                  </div>

                  <div class="mt-4">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" href="#description" role="tab" data-toggle="tab">Description</a>
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

                      <div role="tabpanel" class="tab-pane fade" id="review">

                        <form id="form_review" method="POST">
                          @csrf

                          <h5>Rating</h5>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input product-rating" type="radio" name="rating" id="rating" value="1.0">
                            <label class="form-check-label">1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input product-rating" type="radio" name="rating" id="rating" value="2.0">
                            <label class="form-check-label">2</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input product-rating" type="radio" name="rating" id="rating" value="3.0">
                            <label class="form-check-label">3</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input product-rating" type="radio" name="rating" id="rating" value="4.0">
                            <label class="form-check-label">4</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input product-rating" type="radio" name="rating" id="rating" value="5.0">
                            <label class="form-check-label">5</label>
                          </div>

                          <div class="form-group">
                            <label> <h5>Comments</h5> </label>
                            <textarea type="textarea" name="comment" class="form-control" id="" rows="3" placeholder="Comment" novalidate></textarea>
                          </div>

                          <div class="form-group">
                            <button id="postReview" type="submit" class="btn btn-primary" name="button">Kirim</button>
                          </div>

                        </form>


                        <!-- comments -->
                        @foreach($productReviews as $value )
                        @if(!empty($value->comment))

                          <div id="post_review" class="card-footer card-comments rounded">
                            <div class="card-comment">
                              <!-- User image -->
                              <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle img-sm" alt="User Image">
                              <div class="comment-text">
                                <span class="username">
                                  {{ Auth::user()->name }}
                                  <span class="text-muted float-right">{{ $value->created_at }}</span>
                                </span><!-- /.username -->
                                {{ $value->comment }}
                              </div>
                              <!-- /.comment-text -->
                            </div>
                          </div><br>
                        @else
                        @endif

                      @endforeach
                    </div>
                  </div>


                </div>
                <!-- /.col-md-9 -->
              </div>
              <!-- /.row -->

            </div>
          </div>
        </div>

      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('#postReview').click(function(e) {
         e.preventDefault();
         console.log('posting review');
         var ratingId = $('input[name="rating"]').val();
         var commentId = $('textarea[name="comment"]').val();
         console.log(ratingId);
         console.log(commentId);

         $.ajax({
            url: "{{ route('products.rating', ['id' => $product->id]) }}",
            type: "POST",
            data: {_token: '{{ csrf_token() }}', rating:ratingId, comment:commentId},

            success: function(response){
              window.location.reload();
            }
         });
     });
    </script>

  @endsection
