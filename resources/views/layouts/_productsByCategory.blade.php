@extends("index")

@section("title", "Products by Category")

        @section('category')
          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
            @foreach($categories as $category)
              <a href="{{ route('product.productsByCategory', $category->id) }}"
                       class="list-group-item">{{ $category->name }}</a>
            @endforeach
          </div>
        @endsection

        @section("content")

        @foreach($productsByCat as $product)
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
