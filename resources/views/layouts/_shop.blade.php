@extends("index")


@section("title", "Shop")

        @section('category')
          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            @foreach($categories as $category)
              <a href="{{ route('product.productsByCategory', $category->id) }}"
                       class="list-group-item">{{ $category->name }}</a>
            @endforeach
          </div>
        @endsection


        <!-- /.col-lg-3 -->

        @section("carousel")
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" style="width:1000px ; max-height:300px;" src="{{ asset('uploads/'.$carousels['0']['image'] ) }}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" style="width:1000px; max-height:300px;" src="{{ asset('uploads/'.$carousels['1']['image'] ) }}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid"  style="width:1000px; max-height:300px;" src="{{ asset('uploads/'.$carousels['2']['image'] ) }}" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          @endsection

            @section("content")
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ asset('uploads/'.$product->image ) }}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                  </h4>
                  <h5>$24.99</h5>
                  <h5>Category: {{ $product->category["name"] }}</h5>
                  <p class="card-text">{{str_limit($product->description, 50)}}</p>
                </div>
                <div class="card-footer">
                  <a href="{{ route('product.addToCart', $product->id) }}">Add to cart</a>
                </div>
              </div>
            </div>
            @endforeach

            @endsection
