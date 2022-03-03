@php
    $seo = DB::table('seos')->first();
@endphp
<!doctype html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="{{ $seo->meta_description }}" />
      <meta name="keywords" content="{{ $seo->meta_keyword }}" />
      <meta name="author" content="{{ $seo->meta_author }}" />
      <meta name="brand_name" content="Chandlee News" />
      <meta name="apple-mobile-web-app-title" content="Chandlee News" />
      <!-- Google Analytics -->
      <script>
          {!! $seo->google_analytics !!}
      </script>
      <!-- Google Verification -->
      <noscript>
        {!! $seo->google_verification !!}
      </noscript>
      <!-- Alexa Analytics -->
      <script>
        {!! $seo->alexa_analytics !!}
      </script>
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/animate.min.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/meanmenu.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/boxicons.min.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/magnific-popup.min.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/nice-select.min.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/style.css">
      <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/responsive.css">
      <title>{{ $seo->meta_title }}</title>
      <link rel="icon" type="image/png" href="{{ asset('frontend/') }}/assets/img/facicon_news.png">
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}" >
   </head>
   <body>
      <div class="preloader">
         <div class="loader">
            <div class="wrapper">
               <div class="circle circle-1"></div>
               <div class="circle circle-1a"></div>
               <div class="circle circle-2"></div>
               <div class="circle circle-3"></div>
            </div>
            @if(session()->get('lang') == 'english')
            <span>Loading...</span>
            @else
            <span>লোড হচ্ছে...</span>
            @endif
         </div>
      </div>

      @include('main.body.top-header')
      @include('main.body.header')

      <div class="page-title-area">
         <div class="container">
            <div class="page-title-content">
               <h2>404 error</h2>
               <ul>
                  <li><a href="index.html">Home</a></li>
                  <li>404 error</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="error-area ptb-50">
         <div class="d-table">
            <div class="d-table-cell">
               <div class="container">
                  <div class="error-content">
                     <img src="{{ URL::to('/frontend/') }}/assets/img/404-error.png" alt="error">
                     <h3>Error 404 : page not found</h3>
                     <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                     <a href="{{ url('/') }}" class="default-btn">
                     Go to home
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>

      @include('main.body.footer')

      <div class="go-top">
         <i class='bx bx-up-arrow-alt'></i>
      </div>
      <script src="{{ asset('frontend/') }}/assets/js/jquery.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/popper.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/bootstrap.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/jquery.meanmenu.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/owl.carousel.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/jquery.magnific-popup.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/nice-select.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/jquery.ajaxchimp.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/form-validator.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/contact-form-script.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/wow.min.js"></script>
      <script src="{{ asset('frontend/') }}/assets/js/main.js"></script>
   </body>
</html>
