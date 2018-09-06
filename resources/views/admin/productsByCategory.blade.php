@extends("admin.admin-index")

@section("title", "Products by Category")

@section("content")

<h4>Products sorted by category: {{ $chousenCat['name'] }}</h4>

  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">N</th>
        <th scope="col"><a href="{{ route('admin.dashboard') }}">Id</a></th>
        <th scope="col">Category</th>
        <th scope="col"><a href="{{ route('admin.productsByName') }}">Name</a></th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 0;
       ?>
      @foreach($productsByCat as $product)
      <?php
        $i++;
       ?>
      <tr>
        <td scope="row">{{ $i }}</td>
        <td>{{ $product->id }}</td>
        <td>{{ $product->category["name"] }}</td>
        <td><a href="{{ route('admin.product.show', $product->id) }}">{{ $product->name }}</a></td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->image }}<br><img class="card-img-top" style="width:150px ; max-height:100px;" src="{{ asset('uploads/'.$product->image ) }}" alt=""></td>
        <td>{{ $product->description }}</td>
      </tr>

      @endforeach
    </tbody>
  </table>
@endsection
