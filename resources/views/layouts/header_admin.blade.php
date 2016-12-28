<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> -->
    <title>Company Network</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ url('bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-submenu.min.css') }}">
    <link rel="stylesheet" href="{{ url('summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ url('css/sweetalert.css') }}">

    <script src="https://use.fontawesome.com/35b861f9fb.js"></script>
    <script src="{{ url('js/jquery-3.1.1.js') }}"></script>
    <script src="{{ url('js/tether.min.js') }}"></script>
    <script src="{{ url('bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-submenu.min.js') }}"></script>
    <script src="{{ url('summernote/summernote.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.min.js') }}"></script>

    <style>
      /*@font-face {
        font-family: 'Kanit';
        font-style: normal;
        font-weight: 400;
        src: local('Kanit'), local('Kanit-Regular'), url("{{ url('fonts/Kanit.woff2') }}") format('woff2');
        unicode-range: U+0E01-0E5B, U+200B-200D, U+25CC;
      }*/
      /*body {
        font-family: 'Kanit', sans-serif;
      }*/
      tr, th {
        text-align: center;
        vertical-align: middle !important;
      }
      tr, td {
        text-align: center;
        vertical-align: middle !important;
      }
      .table-none-border {
        border: 0px !important;
      }
      .note-editor .note-editable {
        text-align: left;
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
