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
                @if(session()->get('lang') == 'english')
               <h2>{{ $district->district_en }}</h2>
               @else
               <h2>{{ $district->district_ban }}</h2>
               @endif
               <ul>
                  <li>
                    <a href="{{ url('/') }}">
                      @if(session()->get('lang') == 'english')
                        Home
                      @else
                        হোম
                      @endif
                    </a>
                  </li>
                  @if(session()->get('lang') == 'english')
                  <li>{{ $district->district_en }}</li>
                  @else
                  <li>{{ $district->district_ban }}</li>
                  @endif
               </ul>
            </div>
         </div>
      </div>

      <section class="default-news-area ptb-50">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">

                @foreach($all_data as $data)
                  <div class="single-overview-news">
                     <div class="row align-items-center">
                        <div class="col-lg-4">
                           <div class="overview-news-image">
                              <a href="{{ route('post.view', $data->slug_en) }}">
                              <img src="{{ URL::to($data->image) }}" class="category_image" alt="image">
                              </a>
                           </div>
                        </div>
                        <div class="col-lg-8">
                           <div class="overview-news-content mt-0">
                                @if(session()->get('lang') == 'english')
                                <span>{{ $district->district_en }}</span>
                                @else
                                <span>{{ $district->district_ban }}</span>
                                @endif
                              <h3>
                                <a href="{{ route('post.view', $data->slug_en) }}">
                                    @if(session()->get('lang') == 'english')
                                    {{ $data->title_en }}
                                    @else
                                    {{ $data->title_ban }}
                                    @endif
                                </a>
                              </h3>
                              <p>{{ date('d F, Y', strtotime($data->post_date)) }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
                @endforeach

                {{ $all_data->links('main.paginator') }}
               </div>
               <div class="col-lg-4">
                  <aside class="widget-area">
                    @php
                        $latest_post = DB::table('posts')->orderBy('id', 'desc')->limit(5)->get();
                    @endphp

                    <section class="widget widget_latest_news_thumb">
                        @if(session()->get('lang') == 'english')
                    <h3 class="widget-title">Latest news</h3>
                    @else
                    <h3 class="widget-title">সর্বশেষ সংবাদ</h3>
                    @endif
                    @foreach($latest_post as $post)
                    <article class="item">
                        <a href="{{ route('post.view', $post->slug_en) }}" class="thumb">
                        <img src="{{ URL::to($post->image) }}" class="l_img" role="img"></img>
                        </a>
                        <div class="info">
                            <h4 class="title usmall">
                                <a href="{{ route('post.view', $post->slug_en) }}">
                                    @if(session()->get('lang') == 'english')
                                    {{ Str::words($post->title_en, 6, '...') }}
                                    @else
                                    {{ Str::words($post->title_ban, 6, '...') }}
                                    @endif
                                </a>
                            </h4>
                            <span>{{ date('d F, Y', strtotime($post->post_date)) }}</span>
                        </div>
                    </article>
                    @endforeach
                    </section>
                    @php
                        $popular_post = DB::table('posts')->orderBy('id', 'asc')->inRandomOrder()->limit(5)->get();
                    @endphp
                    <section class="widget widget_popular_posts_thumb">
                    @if(session()->get('lang') == 'english')
                    <h3 class="widget-title">Popular posts</h3>
                    @else
                    <h3 class="widget-title">জনপ্রিয় পোস্ট</h3>
                    @endif
                    @foreach($popular_post as $post)
                    <article class="item">
                        <a href="{{ route('post.view', $post->slug_en) }}" class="thumb">
                        <img src="{{ URL::to($post->image) }}" class="l_img" role="img"></img>
                        </a>
                        <div class="info">
                            <h4 class="title usmall">
                                <a href="{{ route('post.view', $post->slug_en) }}">
                                    @if(session()->get('lang') == 'english')
                                    {{ Str::words($post->title_en, 6, '...') }}
                                    @else
                                    {{ Str::words($post->title_ban, 6, '...') }}
                                    @endif
                                </a>
                            </h4>
                            <span>{{ date('d F, Y', strtotime($post->post_date)) }}</span>
                        </div>
                    </article>
                    @endforeach
                    </section>
                     <section class="widget widget_stay_connected">
                        <h3 class="widget-title">Stay connected</h3>
                        <ul class="stay-connected-list">
                           <li>
                              <a href="#">
                              <i class='bx bxl-facebook'></i>
                              120,345 Fans
                              </a>
                           </li>
                           <li>
                              <a href="#" class="twitter">
                              <i class='bx bxl-twitter'></i>
                              25,321 Followers
                              </a>
                           </li>
                           <li>
                              <a href="#" class="linkedin">
                              <i class='bx bxl-linkedin'></i>
                              7,519 Connect
                              </a>
                           </li>
                           <li>
                              <a href="#" class="youtube">
                              <i class='bx bxl-youtube'></i>
                              101,545 Subscribers
                              </a>
                           </li>
                           <li>
                              <a href="#" class="instagram">
                              <i class='bx bxl-instagram'></i>
                              10,129 Followers
                              </a>
                           </li>
                           <li>
                              <a href="#" class="wifi">
                              <i class='bx bx-wifi'></i>
                              952 Subscribers
                              </a>
                           </li>
                        </ul>
                     </section>
                     <section class="widget widget_featured_reports">
                        <h3 class="widget-title">Featured reports</h3>
                        <div class="single-featured-reports">
                           <div class="featured-reports-image">
                              <a href="#">
                              <img src="assets/img/featured-reports/featured-reports-1.jpg" alt="image">
                              </a>
                              <div class="featured-reports-content">
                                 <h3>
                                    <a href="#">All the highlights from western fashion week summer 2021</a>
                                 </h3>
                                 <p><a href="#">Patricia</a> / 28 September, 2021</p>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="widget widget_newsletter">
                        <div class="newsletter-content">
                           <h3>Subscribe to our newsletter</h3>
                           <p>Subscribe to our newsletter to get the new updates!</p>
                        </div>
                        <form class="newsletter-form" data-toggle="validator">
                           <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required autocomplete="off">
                           <button type="submit">Subscribe</button>
                           <div id="validator-newsletter" class="form-result"></div>
                        </form>
                     </section>
                     <section class="widget widget_most_shared">
                        <h3 class="widget-title">Most shared</h3>
                        <div class="single-most-shared">
                           <div class="most-shared-image">
                              <a href="#">
                              <img src="assets/img/most-shared/most-shared-2.jpg" alt="image">
                              </a>
                              <div class="most-shared-content">
                                 <h3>
                                    <a href="#">All the highlights from western fashion week summer 2021</a>
                                 </h3>
                                 <p><a href="#">Patricia</a> / 28 September, 2021</p>
                              </div>
                           </div>
                        </div>
                     </section>
                     <section class="widget widget_tag_cloud">
                        <h3 class="widget-title">Tags</h3>
                        <div class="tagcloud">
                           <a href="#">News</a>
                           <a href="#">Business</a>
                           <a href="#">Health</a>
                           <a href="#">Politics</a>
                           <a href="#">Magazine</a>
                           <a href="#">Sport</a>
                           <a href="#">Tech</a>
                           <a href="#">Video</a>
                           <a href="#">Global</a>
                           <a href="#">Culture</a>
                           <a href="#">Fashion</a>
                        </div>
                     </section>
                     <section class="widget widget_instagram">
                        <h3 class="widget-title">Instagram</h3>
                        <ul>
                           <li>
                              <div class="box">
                                 <img src="assets/img/latest-news/latest-news-1.jpg" alt="image">
                                 <i class="bx bxl-instagram"></i>
                                 <a href="#" target="_blank" class="link-btn"></a>
                              </div>
                           </li>
                           <li>
                              <div class="box">
                                 <img src="assets/img/latest-news/latest-news-2.jpg" alt="image">
                                 <i class="bx bxl-instagram"></i>
                                 <a href="#" target="_blank" class="link-btn"></a>
                              </div>
                           </li>
                           <li>
                              <div class="box">
                                 <img src="assets/img/latest-news/latest-news-3.jpg" alt="image">
                                 <i class="bx bxl-instagram"></i>
                                 <a href="#" target="_blank" class="link-btn"></a>
                              </div>
                           </li>
                           <li>
                              <div class="box">
                                 <img src="assets/img/latest-news/latest-news-4.jpg" alt="image">
                                 <i class="bx bxl-instagram"></i>
                                 <a href="#" target="_blank" class="link-btn"></a>
                              </div>
                           </li>
                           <li>
                              <div class="box">
                                 <img src="assets/img/latest-news/latest-news-5.jpg" alt="image">
                                 <i class="bx bxl-instagram"></i>
                                 <a href="#" target="_blank" class="link-btn"></a>
                              </div>
                           </li>
                           <li>
                              <div class="box">
                                 <img src="assets/img/latest-news/latest-news-6.jpg" alt="image">
                                 <i class="bx bxl-instagram"></i>
                                 <a href="#" target="_blank" class="link-btn"></a>
                              </div>
                           </li>
                        </ul>
                     </section>
                  </aside>
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

