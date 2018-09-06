<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
  </head>
  <body>
<div class="container">
 <div class="row">
   <div class="col-md-6">
    <h3> Products </h3>
    @foreach($products as $product)
      <hr>
      <p>Name  : {{ $product->name }}</p>
      <p>Price :{{ $product->price }}</p>
      <p><a class="" href="#">
           <img width="150" src="{{ asset('uploads/'.$product->image ) }}" alt="DevMarketer Logo"/>
         </a>
      </p>

      <a href="{{ route('product.addToCart', $product->id) }}">Add to cart</a>

    @endforeach
  </div>
  <div class="col-md-6">
   <div>-.-.-.-.-.</div>
   <div><a href="{{ route('product.shoppingCart') }}">Go to cart</a></div>
  </div>
 </div>
</div>
  </body>
</html>
