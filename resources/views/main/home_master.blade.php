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

      @php
        $notice = DB::table('notices')->first();
      @endphp

     @if($notice->status == 1)
     <div class="top-header-area bg-ffffff">
        <div class="container">
           <div class="row align-items-center">
              <div class="col-lg-12">
                 <div class="breaking-news-content">
                    <h6 class="breaking-title">
                       @if(session()->get('lang') == 'english')
                       Notice:&nbsp;&nbsp;
                       @else
                       নোটিশ:&nbsp;&nbsp;
                       @endif
                    </h6>
                    <div class="breaking-news-slides owl-carousel owl-theme">
                       <div class="single-breaking-news">
                          <p>
                             <a href="#">
                              <marquee>
                               @if(session()->get('lang') == 'english')
                               {!! $notice->notice_en !!}
                               @else
                               {!! $notice->notice_ban !!}
                               @endif
                              </marquee>
                             </a>
                          </p>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     @endif

      @section('content')
      @show


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
