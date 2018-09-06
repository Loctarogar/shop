<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield("title")</title>
    @yield("css")

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('files/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('files/shop-homepage.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include("layouts._shopNav")

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-md-6">
          @if(Session::has("cart"))

           @if($cart->items)


            <table class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Picture</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($cart->items as $cart_item)
                  <tr>
                    <td scope="row"><img class="card-img-top" style="width:80px";
                      src="{{ asset('uploads/'.$cart_item['item']['image'] ) }}" alt=""></td>
                    <td scope="row">{{ $cart_item['item']['name'] }}</td>
                    <td scope="row">{{ $cart_item["item"]["price"]}}</td>
                    <td scope="row">{{ $cart_item['qty'] }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
           @endif
          @else
            <h3>There is nothing in the cart yet</h3>
          @endif

        </div>

        <div class="col-md-6">
          <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D0%A1%D1%83%D0%BC%D0%BC%D0%B0&targets-hint=&default-sum=&button-text=12&payment-type-choice=on&fio=on&phone=on&comment=on&address=on&hint=&successURL=&quickpay=shop&account=410017455517746"
          width="100%" height="307" frameborder="0" allowtransparency="true" scrolling="no"></iframe>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('files/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('files/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>
