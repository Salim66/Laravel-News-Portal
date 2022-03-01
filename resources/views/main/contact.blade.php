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
               <h2>Contact</h2>
               @else
               <h2>যোগাযোগ</h2>
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
                  <li>Contact</li>
                  @else
                  <li>যোগাযোগ</li>
                  @endif

               </ul>
            </div>
         </div>
      </div>
      <section class="contact-area ptb-50">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.4509306591394!2d90.3979240144582!3d23.873623589975864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c43ba554d03b%3A0x23f7a03cc3ed6c5e!2sHossain%20Tower%2C%20103%20Dhaka%20-%20Mymensingh%20Hwy%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1646149047756!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
                  <ul class="contact-info">
                     <li>
                         @if(session()->get('lang') == 'english')
                        <span>Address:</span>
                        @else
                        <span>ঠিকানা:</span>
                        @endif

                        @if(session()->get('lang') == 'english')
                        {{ $data->address_en }}
                        @else
                        {{ $data->address_ban }}
                        @endif
                     </li>
                     <li>
                        @if(session()->get('lang') == 'english')
                        <span>Phone:</span>
                        @else
                        <span>ফোন:</span>
                        @endif

                        @if(session()->get('lang') == 'english')
                        <a href="tel:{{ $data->phone_en }}">{{ $data->phone_en }}</a>
                        @else
                        <a href="tel:{{ $data->phone_ban }}">{{ $data->phone_ban }}</a>
                        @endif
                     </li>
                  </ul>
                  <div class="contact-form">
                     <div class="title">
                        <h3>Ready to get started?</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                     </div>
                     <form id="contactForm">
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                 <input type="text" name="name" class="form-control" id="name" required data-error="Please enter your name" placeholder="Name">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                 <input type="email" name="email" class="form-control" id="email" required data-error="Please enter your email" placeholder="Email">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                 <input type="text" name="phone_number" class="form-control" id="phone_number" required data-error="Please enter your phone number" placeholder="Phone">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                 <input type="text" name="subject" class="form-control" id="subject" required data-error="Please enter your subject" placeholder="Subject">
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                 <textarea name="message" id="message" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="Write your message..."></textarea>
                                 <div class="help-block with-errors"></div>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="checkme">
                                 <label class="form-check-label" for="checkme">
                                 Accept <a href="terms-of-service.html">Terms of Services</a> and <a href="privacy-policy.html">Privacy Policy.</a>
                                 </label>
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <button type="submit" class="default-btn">Send Message</button>
                              <div id="msgSubmit" class="h3 text-center hidden"></div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-lg-4">
                  <aside class="widget-area">
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

                     <section class="widget widget_newsletter">
                        <div class="newsletter-content">
                            @if(session()->get('lang') == 'english')
                            <h3>Subscribe to our newsletter</h3>
                            @else
                            <h3>আমাদের নিউজলেটার সাবস্ক্রাইব করুন</h3>
                            @endif


                            @if(session()->get('lang') == 'english')
                            <p>Subscribe to our newsletter to get the new updates!</p>
                            @else
                            <p>নতুন আপডেট পেতে আমাদের নিউজলেটার সাবস্ক্রাইব করুন!</p>
                            @endif
                        </div>
                        <form class="newsletter-form" data-toggle="validator">
                           <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required autocomplete="off">
                           <button type="submit">Subscribe</button>
                           <div id="validator-newsletter" class="form-result"></div>
                        </form>
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
