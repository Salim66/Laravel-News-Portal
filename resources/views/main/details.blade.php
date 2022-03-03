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
        <meta name="csrf_token" content="{{ csrf_token() }}" />
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

        <!-- Toastr CSS -->
	    <link rel="stylesheet" href="{{ asset('backend/assets/css/toastr.min.css') }}">

        <link rel="icon" type="image/png" href="{{ asset('frontend/') }}/assets/img/facicon_news.png">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}" >
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=621cb8f8b846610019d3dc86&product=inline-share-buttons" async="async"></script>
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
      <div class="top-header-area bg-ffffff">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-6">
                  <div class="breaking-news-content">
                     <h6 class="breaking-title">
                        @if(session()->get('lang') == 'english')
                        Breaking News:
                        @else
                        সদ্যপ্রাপ্ত সংবাদ:
                        @endif
                     </h6>
                     @php
                         $headline = DB::table('posts')->where('headline', 1)->orderBy('id', 'DESC')->limit(3)->get();
                     @endphp
                     <div class="breaking-news-slides owl-carousel owl-theme">
                        @foreach($headline as $head)
                        <div class="single-breaking-news">
                           <p>
                              <a href="#">
                                @if(session()->get('lang') == 'english')
                                {{ $head->title_en }}
                                @else
                                {{ $head->title_ban }}
                                @endif
                              </a>
                           </p>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               @include('main.body.language-login')
            </div>
         </div>
      </div>
      @include('main.body.header')
      <div class="page-title-area">
         <div class="container">
            <div class="page-title-content">
                @if(session()->get('lang') == 'english')
               <h2>News details</h2>
               @else
               <h2>খবর বিস্তারিত</h2>
               @endif
               <ul>
                  <li><a href="{{ url('/') }}">
                    @if(session()->get('lang') == 'english')
                      Home
                    @else
                      হোম
                    @endif
                  </a></li>
                  @if(session()->get('lang') == 'english')
                  <li>News details</li>
                  @else
                  <li>খবর বিস্তারিত</li>
                  @endif
               </ul>
            </div>
         </div>
      </div>
      <section class="news-details-area ptb-50">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-12">
                  <div class="blog-details-desc">
                     <div class="article-image">
                        <img src="{{ URL::to($data->image) }}" alt="image">
                     </div>
                     <div class="article-content">
                        <span><a href="#">{{ $data->name }}</a> / {{ date('d F Y') }} / <a href="#">0 Comment</a></span>
                        @if(session()->get('lang') == 'english')
                        <h3>{{ $data->title_en }}</h3>
                        @else
                        <h3>{{ $data->title_ban }}</h3>
                        @endif
                        <div>
                            @if(session()->get('lang') == 'english')
                            {!! htmlspecialchars_decode($data->details_en) !!}
                            @else
                            {!! htmlspecialchars_decode($data->details_ban) !!}
                            @endif
                        </div>

                     </div>
                     <div class="article-footer">
                        <div class="article-share">
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                     </div>
                     <div class="post-navigation">

                     </div>

                      <!-- Facebook Comment Plugin -->
                      {{-- <div id="fb-root"></div>
                     <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1 version=v8.0" nonce="ClFC86MV"></script>
                     <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8"></div> --}}
                      <!-- ! Facebook Comment Plugin -->

                      <div id="disqus_thread"></div>
                      <script>
                          /**
                          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                          /*
                          var disqus_config = function () {
                          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                          };
                          */
                          (function() { // DON'T EDIT BELOW THIS LINE
                          var d = document, s = d.createElement('script');
                          s.src = 'https://chandleenews.disqus.com/embed.js';
                          s.setAttribute('data-timestamp', +new Date());
                          (d.head || d.body).appendChild(s);
                          })();
                      </script>
                      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                  </div>
               </div>



               <div class="col-lg-4">
                  <aside class="widget-area">
                     <div class="widget widget_search">
                        <form class="search-form">
                           <label>
                           <span class="screen-reader-text">Search for:</span>
                           <input type="search" class="search-field" placeholder="Search...">
                           </label>
                           <button type="submit">
                           <i class='bx bx-search'></i>
                           </button>
                        </form>
                     </div>
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

      <!-- Toastr JS -->
	<script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('message'))
         let type = "{{ Session::get('alert-type', 'info') }}"
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

              case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>

    <!-- Custom JS -->
    <script src="{{ asset('frontend/') }}/assets/js/custom.js"></script>

   </body>
</html>
