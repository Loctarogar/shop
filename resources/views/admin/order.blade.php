@extends("index")

@section("category")
@if(Session::has("cart"))

 @if($cart->items)
  @foreach($cart->items as $cart_item)

  <?php
   $a = ($cart_item["item"]["price"]*$cart_item["qty"]);
  ?>
  <div class="row">

    <h5>{{ $cart_item['item']['name'] }}</h5><br>
    <h5>Price for 1: {{ $cart_item["item"]["price"]}}</h5><br>
    <h5>Qty   : {{ $cart_item['qty'] }}</h5><br>
    <h5>Total price: {{ $a }}</h5><br>
    <hr>
  </div>
  @endforeach
 @endif
 @else
    <h3>There is nothing in the cart yet</h3>
@endif
lsjfsdl
@endsection


@section("content")
  <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D0%A1%D1%83%D0%BC%D0%BC%D0%B0&targets-hint=&default-sum=&button-text=12&payment-type-choice=on&fio=on&phone=on&comment=on&address=on&hint=&successURL=&quickpay=shop&account=410017455517746"
  width="100%" height="307" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
@endsection
