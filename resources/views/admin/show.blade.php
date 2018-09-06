@extends("admin.admin-index")

@section("content")
<div class="container">

  <div class="row">
    <div class="col-md">
      {{ $product->name }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <img class="card-img-top" src="{{ asset('uploads/'.$product->image ) }}" alt="">

    </div>
    <div class="col-md-6">
      Price: $ {{ $product->price }}
      <br>
      @if ($product->category)
        Category:{{ $product->category->name }}
      @else
        There is no category
      @endif
      <br>
      @if ($product->tag)
        @foreach($product->tag as $tag)
          {{ $tag }}
        @endforeach
      @else
        There is no tag
      @endif
      <br>
      Description: {{ $product->description }}
    </div>
  </div>

  <div class="row">

    <div class="col-md-2">
      <a class="btn btn-primary" href="{{ route('admin.product.edit', $product->id) }}">Edit</a>
    </div>

    <div class="col-md-2">
          <a class="btn btn-primary" href="{{ route('admin.product.destroy', $product->id) }}">Destroy</a>
    </div>
  </div>

</div>
@endsection
