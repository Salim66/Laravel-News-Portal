@php
    $seo = DB::table('seos')->first();
    $websetting = DB::table('websitesettings')->first();
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

        <!-- Share Button  -->
       <meta property="og:title"
        @if(session()->get('lang') == 'english')
        content="{{ $data->title_en }}" />
        @else
        content="{{ $data->title_ban }}"
        @endif

       <meta property="og:url" content="http://www.chandleenews.com" />
       <meta property="og:image" content="{{ URL::to($data->image) }}" />

       @php
        $title_en = htmlspecialchars_decode($data->details_en);
        $title_ban = htmlspecialchars_decode($data->details_ban);
       @endphp

       <meta property="og:description"
        @if(session()->get('lang') == 'english')
        content="{{ htmlspecialchars_decode($title_en) }}"
        @else
        content="{{ htmlspecialchars_decode($title_ban) }}"
        @endif
         />
       <meta property="og:site_name" content="chandleenews" />
       <!-- !Share Button  -->


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

        <script src="{{ asset('frontend/') }}/assets/js/jquery.min.js"></script>
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
               <div class="col-lg-8">
                  <div class="breaking-news-content">
                     {{-- <h6 class="breaking-title">
                        @if(session()->get('lang') == 'english')
                        Breaking News:
                        @else
                        সদ্যপ্রাপ্ত সংবাদ:
                        @endif
                     </h6> --}}
                     @php
                         $headline = DB::table('posts')->where('headline', 1)->orderBy('id', 'DESC')->limit(3)->get();
                     @endphp
                     {{-- <div class="breaking-news-slides owl-carousel owl-theme">
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
                     </div> --}}
                     <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
                        @foreach($headline as $head)
                        <a href="{{ route('post.view', $head->slug_en) }}">
                        @if(session()->get('lang') == 'english')
                        {{ $head->title_en }}
                        @else
                        {{ $head->title_ban }}
                        @endif    
                        </a> 
                        <span class="dot"></span> 
                        @endforeach
                    </marquee>
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
                        <span><a href="{{ route('user.post', $data->user_id) }}">{{ $data->name }}</a> / {{ date('d F Y') }} </span>
                        @if(session()->get('lang') == 'english')
                        <h3>{{ $data->title_en }}</h3>
                        @else
                        <h3>{{ $data->title_ban }}</h3>
                        @endif
                        <div class="details_post">
                            @if(session()->get('lang') == 'english')
                            {!! htmlspecialchars_decode($data->details_en) !!}
                            @else
                            {!! htmlspecialchars_decode($data->details_ban) !!}
                            @endif
                        </div>
                        <br>
                        <br>

                          <!-- Add Section -->
                                @php
                                $adds_ban = DB::table('ads')->where('type', 2)->skip(3)->first();
                            @endphp

                            @if($adds_ban == NULL)

                            @else
                            <div class="default-news-area">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <a target="_blank" href="{{ $adds_ban->link }}"><img src="{{ URL::to($adds_ban->ads) }}" alt="" class="antorjatik_ads_img"></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- End Add Section -->
                     </div>
                     <div class="article-footer">
                        <div class="article-share">
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                     </div>
                     <div class="post-navigation">

                     </div>

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

                    <!--- Ads Section -->
                    @php
                        $adds_v_two = DB::table('ads')->where('type', 1)->skip(3)->first();
                    @endphp

                    @if($adds_v_two == NULL)

                    @else
                    <section class="widget widget_most_shared">
                        <div class="">
                        <div class="most-shared-image">
                            <a target="_blank" href="{{ $adds_v_two->link }}">
                            <img src="{{ URL::to($adds_v_two->ads) }}" alt="image" class="sidebar_ads_image">
                            </a>
                        </div>
                        </div>
                    </section>
                    @endif
                    <!--- End Ads Section -->

                     <div class="widget widget_search">
                        <form class="search-form" action="{{ route('search') }}" method="POST">
                            @csrf
                           <label>
                           <span class="screen-reader-text">@if(session()->get('lang') == 'english') Search for: @else অনুসন্ধান করুন: @endif</span>
                           <input type="search" name="search" class="search-field" placeholder="@if(session()->get('lang') == 'english') Search for... @else অনুসন্ধান করুন... @endif">
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

                    <!--- Ads Section -->
                    @php
                        $adds_f_two = DB::table('ads')->where('type', 1)->skip(4)->first();
                    @endphp

                    @if($adds_f_two == NULL)

                    @else
                    <section class="widget widget_most_shared">
                        <div class="">
                        <div class="most-shared-image">
                            <a target="_blank" href="{{ $adds_f_two->link }}">
                            <img src="{{ URL::to($adds_f_two->ads) }}" alt="image" class="sidebar_ads_image">
                            </a>
                        </div>
                        </div>
                    </section>
                    @endif
                    <!--- End Ads Section -->

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
                        @if(session()->get('lang') == 'english')
                        <h3 class="widget-title">Stay connected</h3>
                        @else
                        <h3 class="widget-title">যুক্ত থাকুন</h3>
                        @endif

                        <!-- Facebook Page -->
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="DGGeTXZi"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/chandleenews" data-tabs="" data-width="357" data-height="160" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/chandleenews" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/chandleenews">Chandlee News</a></blockquote></div>



                     </section>


                     @php
                         $tags = DB::table('tags')->get();
                     @endphp

                     <section class="widget widget_tag_cloud">
                         @if(session()->get('lang') == 'english')
                        <h3 class="widget-title">Tags</h3>
                        @else
                        <h3 class="widget-title">ট্যাগ</h3>
                        @endif
                        <div class="tagcloud">
                           @foreach($tags as $tag)
                           <a href="{{ url('/tag/' . $tag->id .'/' . $tag->tag_en) }}">
                               @if(session()->get('lang') == 'english')
                               {{ $tag->tag_en }}
                               @else
                               {{ $tag->tag_ban }}
                               @endif
                            </a>
                           @endforeach
                        </div>
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
