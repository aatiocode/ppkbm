<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{ URL::asset('/images/favicon.ico') }}" type="image/x-icon"/>
    <title>Edumart - Educational Template</title>
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/fonts.css') }}">
    <link href="{{ URL::asset('/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/magnific-popup/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/iconmoon/css/iconmoon.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/assets/owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet">
</head>

<body class="body-min-height">
  <div id="loading">
      <div class="element">
          <div class="sk-folding-cube">
              <div class="sk-cube1 sk-cube"></div>
              <div class="sk-cube2 sk-cube"></div>
              <div class="sk-cube4 sk-cube"></div>
              <div class="sk-cube3 sk-cube"></div>
          </div>
      </div>
  </div>
  @if(Session::has('message'))
    {!! Session::get('message') !!}
  @endif
	@include('landing/header')
  @yield('contentlanding')
  @include('landing/footer')
  @yield('js')
  <!-- Optional JavaScript -->
  <script src="{{ asset('/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/assets/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('/assets/matchHeight/js/matchHeight-min.js') }}"></script>
  <script src="{{ asset('/assets/bxslider/js/bxslider.min.js') }}"></script>
  <script src="{{ asset('/assets/waypoints/js/waypoints.min.js') }}"></script>
  <script src="{{ asset('/assets/counterup/js/counterup.min.js') }}"></script>
  <script src="{{ asset('/assets/magnific-popup/js/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('/assets/owl-carousel/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('/js/modernizr.custom.js') }}"></script>
  <script src="{{ asset('/js/custom.js') }}"></script>
</body>
</html>
