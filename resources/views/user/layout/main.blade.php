<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title', 'E-Learning')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="E-Learning project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/user/all.css') }}">

@yield('css')

</head>

<body>
  <div class="super_container">
      @include('user.layout.header')

      @yield('content')

      @include('user.layout.footer')
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/user/user-layout.js') }}" type="text/javascript"></script>
  <script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
  <script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
  <script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
  <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
  <script src="{{ asset('plugins/easing/easing.js') }}"></script>
  <script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
  @yield('js')
</body>
</html>