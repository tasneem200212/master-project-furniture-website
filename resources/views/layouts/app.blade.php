<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>@yield('title', 'Ecommerce Furniture')</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/furniture/favicon.png') }}">

   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-pro.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

   @stack('styles') 
</head>

<body>
    @include('partials.preloader')
    @include('partials.search_area')
    @include('partials.Offcanvas_area')
    @include('partials.Quick_View_Modal')




   @include('partials.header')

   <main>
       @yield('content')
   </main>

   @include('partials.footer')

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
   <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
   <script src="{{ asset('assets/js/slick.min.js') }}"></script>
   <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
   <script src="{{ asset('assets/js/counterup.js') }}"></script>
   <script src="{{ asset('assets/js/wow.js') }}"></script>
   <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
   <script src="{{ asset('assets/js/beforeafter.jquery-1.0.0.min.js') }}"></script>
   <script src="{{ asset('assets/js/main.js') }}"></script>

   @stack('scripts') 

   <!-- Existing scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Add this after jQuery is loaded -->
<script>
$(document).ready(function() {
    $('.quick-view-btn').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
        
        $.ajax({
            url: '/Quick_View_Modal/' + productId,
            type: 'GET',
            success: function(response) {
                $('#productQuickViewModal .modal-content').html(response);
                $('#productQuickViewModal').modal('show');
            }
        });
    });
});
</script>
</body>
</body>
</html>
