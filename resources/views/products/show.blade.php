@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row">
      @foreach($products as $product)

        <div class="col-md-3">
          <img src="{{ url('/image_files/'.$product->image_url) }}" class="card-img-top" alt="">
        </div>

        <div class="col-md-9">
          <div class="">
            <h3>
              {{ $product->name }}
            </h3>
            <p>
              @php $rating = $product->rating ; @endphp
              <div class="placeholder" style="color:lightgray">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <span class="small">{{ $rating }}</span>
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
            {{ $product->price }}
          </h4>
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

                <form class="" action="{{ route('products.rating', ['id' => $product->id]) }}" method="POST">
                  @csrf

                  <h5>Rating</h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input product-rating" type="radio" name="rating" id="inlineRadio1" value="1.0">
                    <label class="form-check-label">1</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input product-rating" type="radio" name="rating" id="inlineRadio2" value="2.0">
                    <label class="form-check-label">2</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input product-rating" type="radio" name="rating" id="inlineRadio3" value="3.0">
                    <label class="form-check-label">3</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input product-rating" type="radio" name="rating" id="inlineRadio4" value="4.0">
                    <label class="form-check-label">4</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input product-rating" type="radio" name="rating" id="inlineRadio5" value="5.0">
                    <label class="form-check-label">5</label>
                  </div>

                  <div class="form-group">
                    <label> <h5>Comments</h5> </label>
                    <textarea type="textarea" name="description" class="form-control" id="ckview" rows="3" placeholder="Deskripsi" novalidate></textarea>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="button">Kirim</button>
                  </div>

                </form>
                <!-- comments -->
                @if( $product->description > 0)
                  <div class="media">
                    <img src="..." class="mr-3" alt="...">
                    <div class="media-body">
                      <h5 class="mt-0">{{ $product->name }}</h5>
                      {{ $product->description }}
                    </div>
                  </div>
                @else

                @endif

              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script type="text/javascript">

        </script>
  @endsection

<script type="text/javascript" src="{{ url ('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ url ('plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">tinymce.init({ selector:'#ckview'})</script>
