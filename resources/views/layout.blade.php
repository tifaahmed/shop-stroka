<!DOCTYPE html>

 

<!--  -->
<html class="no-js"   dir="rtl">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 

    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="theme-color" content="#3366cc">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('title')


    @yield('meta')

 
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Karla:400,700italic,700,400italic' rel='stylesheet' type='text/css'>

         <!-- fonts -->
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
         <!-- css -->
         <link rel="stylesheet" href="{{asset('asset_ar/vendor/bootstrap/css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{asset('asset_ar/vendor/owl-carousel/assets/owl.carousel.min.css')}}">
         <link rel="stylesheet" href="{{asset('asset_ar/vendor/photoswipe/photoswipe.css')}}">
         <link rel="stylesheet" href="{{asset('asset_ar/vendor/photoswipe/default-skin/default-skin.css')}}">
         <link rel="stylesheet" href="{{asset('asset_ar/vendor/select2/css/select2.min.css')}}">
         <link rel="stylesheet" href="{{asset('asset_ar/css/style.css')}}">
         <!-- font - fontawesome -->
         <link rel="stylesheet" href="{{asset('asset_ar/vendor/fontawesome/css/all.min.css')}}">
         <!-- font - stroyka -->
         <link rel="stylesheet" href="{{asset('asset_ar/fonts/stroyka/stroyka.css')}}">

  </head>


  <body>

      <div class="site">
        @include('pages.partials.header.index')

        @yield('content')

        @include('pages.partials.footer.index')

      </div>

      <script src="{{asset('asset_ar/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('asset_ar/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('asset_ar/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('asset_ar/vendor/nouislider/nouislider.min.js')}}"></script>
      <script src="{{asset('asset_ar/vendor/photoswipe/photoswipe.min.js')}}"></script>
      <script src="{{asset('asset_ar/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
      <script src="{{asset('asset_ar/vendor/select2/js/select2.min.js')}}"></script>
      <script src="{{asset('asset_ar/js/number.js')}}"></script>
      <script src="{{asset('asset_ar/js/main.js')}}"></script>
      <script src="{{asset('asset_ar/js/header.js')}}"></script>
      <script src="{{asset('asset_ar/vendor/svg4everybody/svg4everybody.min.js')}}"></script>
      <script>
          svg4everybody();
      </script>

     

  </body>

</html>