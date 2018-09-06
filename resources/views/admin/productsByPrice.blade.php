@extends("admin.admin-index")

@section("title", "Products by Category")

@section("content")

  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">N</th>
        <th scope="col"><a href="{{ route('admin.dashboard') }}">Id</a></th>
        <th scope="col">Category</th>
        <th scope="col"><a href="{{ route('admin.productsByName') }}">Name</a></th>
        <th scope="col"><a href="{{ route('admin.productsByPrice') }}">Price</a></th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 0;
       ?>
      @foreach($products as $product)
      <?php
        $i++;
       ?>
      <tr>
        <td scope="row">{{ $i }}</td>
        <td>{{ $product->id }}</td>
        <td>{{ $product->category["name"] }}</td>
        <td><a href="{{ route('admin.product.show', $product->id) }}">{{ $product->name }}</a></td>
        <td>{{ $product->price }}</td>
        <td><img class="card-img-top" style="width:150px ;
            max-height:100px;" src="{{ asset('uploads/'.$product->image ) }}" alt=""></td>
        <td>{{ str_limit($product->description, 50) }}</td>
      </tr>

      @endforeach
    </tbody>
  </table>
@endsection
