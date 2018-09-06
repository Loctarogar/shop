@extends("index")
@section("title", "Cart")

@section("category")
@if(Session::has("cart"))
    Total Price - {{ $cart->totalPrice }}<br>
    Total Quantity - {{ $cart->totalQty }}
@else
    Total Price: --<br>
    Total Quqntity: --
@endif

@endsection

@section("carousel")
@endsection

@section("content")


@if(Session::has("cart"))

 @if($cart->items)
  @foreach($cart->items as $cart_item)

  <?php
   $a = ($cart_item["item"]["price"]*$cart_item["qty"]);
  ?>
  <div class="row md-2">
   <div class="col-md-4">
    <img class="card-img-top" src="{{ asset('uploads/'.$cart_item['item']['image'] ) }}" alt="">
   </div>

   <div class="col-md-8">
    <a href="{{ route('product.show', ['id' => $cart_item['id']]) }}">{{ $cart_item['item']['name'] }}</a>
    <h5>Price for 1: {{ $cart_item["item"]["price"]}}</h5>
    <h5>Qty   : {{ $cart_item['qty'] }}</h5>
    <h5>Total price: {{ $a }}</h5>
    <form method="post">
     <a href="{{ route('product.delOneCartItem', ['id' => $cart_item['id']]) }}">Del one item</a>
     <a href="{{ route('product.delCartItem', ['id' => $cart_item['id']]) }}">Del item</a>
    </form>
   </div>
  </div>
  <div class="row md-2">
    <p>/--/{{ $cart_item["item"]["description"]}}/--/
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Modo etiam
      paulum ad dexteram de via declinavi, ut ad Pericli
      sepulcrum accederem. Sed in rebus apertissimis nimium longi sumus.
    </p>

  </div>

  @endforeach
 <a class="btn btn-success" href="{{ route('order.create') }}" role="button">Order</a>
 @endif

 @else
    <h3>There is nothing in the cart yet</h3>

@endif




@endsection
