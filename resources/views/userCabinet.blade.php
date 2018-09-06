@extends("index")

@section("title", "User Cabinet")

@section("content")
  @foreach($orders as $order)

    @foreach($order->cart->items as $item)
      {{ $item['price'] }}<br>
    @endforeach
  @endforeach
@endsection
