<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield("title")</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('files/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('files/shop-homepage.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include("admin.layouts._adminNav")

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-lg-3">
          @include("admin.layouts.side_panel")
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="row">

          @yield("content")

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('files/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('files/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>
