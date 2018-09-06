@extends("index")

@section("title", "Product")

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
@endsection

@section("content")
<div class="container">

  <div class="row">
    <div class="col-md">
      {{ $product->name }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <a href="#"><img class="card-img-top" src="{{ asset('uploads/'.$product->image ) }}" alt=""></a>

    </div>
    <div class="col-md-6">
      Price: $ {{ $product->price }}
      <br>
      @if ($product->category)
        Category: {{ $product->category->name }}
      @else
        There is no category
      @endif
      <br>
      <a href="{{ route('product.addToCart', $product->id) }}">Add to cart</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md">
      Description
      <br>
      {{ $product->description }}
      <br>

      <hr>
      Someones name
      <br>
      Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments
      Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments
      <br>
      <hr>
      Someones name
      <br>
      Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments
      Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments Comments
    </div>
  </div>
</div>
@endsection
