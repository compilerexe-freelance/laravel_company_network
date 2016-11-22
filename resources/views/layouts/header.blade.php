<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Company Network</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
  </head>
  <body>

    <div class="container">
      @include('layouts.banner')
      @include('layouts.promotion')
      @include('layouts.menu')
      @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
    <script src="{{ url('js/jquery-3.1.1.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>
  </body>
</html>
