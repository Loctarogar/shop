@extends("index")

@section("category")
@endsection

@section("carousel")
@endsection

@section("content")


    @if(Session::has("cart"))
      Total price - {{ $cart->totalPrice }}
      Total Quantity - {{ $cart->totalQty }}


     @if($cart->items)
      @foreach($cart->items as $cart_item)

        <h4>Product</h4>
        <?php
         $a = ($cart_item["item"]["price"]*$cart_item["qty"]);
        ?>

        <a href="{{ route('product.show', ['id' => $cart_item['id']]) }}">{{ $cart_item['item']['name'] }}</a>
        <p> Name  : {{ $cart_item['item']['name'] }}</p>
        <p><a class="" href="{{ route('product.show', ['id' => $cart_item['id']]) }}">
             <img width="150" src="{{ asset('uploads/'.$cart_item['item']['image'] ) }}" alt="Image"/>
           </a>
        </p>
        <p> Price : {{ $cart_item["item"]["price"]}} / Total: {{ $a }}</p>
        <p> Qty   : {{ $cart_item['qty'] }}</p>
        <p>{{ $cart_item["item"]["id"] }}</p>

        <form method="post">
         <a href="{{ route('product.delOneCartItem', ['id' => $cart_item['id']]) }}">Del one item</a>
         <a href="{{ route('product.delCartItem', ['id' => $cart_item['id']]) }}">Del item</a>
        </form>

      @endforeach
     @endif
    @endif
@endsection


<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="{{ asset('uploads/'.$cart_item['item']['image'] ) }}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#">{{ $cart_item['item']['name'] }}</a>
      </h4>
      <h5>Price for 1: {{ $cart_item["item"]["price"]}}</h5>
      <h5>Qty   : {{ $cart_item['qty'] }}</h5>
      <h5>Total price: {{ $a }}</h5>
      <p class="card-text">Description  Descr iption Descr iptionDesc riptio nDescr iption
                           Desc ription Descrip tionDe scrip tionD escription Descrip</p>
    </div>
    <div class="card-footer">
      <a href="{{ route('product.delOneCartItem', ['id' => $cart_item['id']]) }}">Delete One</a><br>
      <a href="{{ route('product.delCartItem', ['id' => $cart_item['id']]) }}">Delete All</a>
    </div>
  </div>
</div>
