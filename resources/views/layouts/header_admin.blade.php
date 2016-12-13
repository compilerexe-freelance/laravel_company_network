<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Company Network</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('bootstrap-4-alpha-5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-submenu.min.css') }}">

    <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
    <script src="{{ url('js/jquery-3.1.1.js') }}"></script>
    <script src="{{ url('js/tether.min.js') }}"></script>
    <script src="{{ url('bootstrap-4-alpha-5/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-submenu.min.js') }}"></script>

    <style>
      body {
        font-family: 'Kanit', sans-serif;
      }

      .table-none-border {
        border: 0px !important;
      }
    </style>

  </head>
  <body>

    <div class="container">
      @include('layouts.menu_admin')
      @yield('content')
      <!-- @include('layouts.footer') -->
    </div>

    <!-- <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
    <script src="{{ url('js/jquery-3.1.1.js') }}"></script>
    <script src="{{ url('js/tether.min.js') }}"></script>
    <script src="{{ url('bootstrap-4-alpha-5/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-submenu.min.js') }}"></script> -->
  </body>
</html>
