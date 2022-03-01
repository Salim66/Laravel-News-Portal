@php
    $websetting = DB::table('websitesettings')->first();
@endphp
<section class="footer-area pt-100 pb-70">
    <div class="container">
       <div class="row">
          <div class="col-lg-3 col-md-6">
             <div class="single-footer-widget">
                <a href="{{ url('/') }}">
                <img src="{{ URL::to($websetting->logo) }}" style="height: 80px" alt="image">
                </a>
                @if(session()->get('lang') == 'english')
                <p>{!! $websetting->footer_desc_en !!}</p>
                @else
                <p>{!! $websetting->footer_desc_ban !!}</p>
                @endif

                @php
                    $social = DB::table('socials')->first();
                @endphp

                <ul class="social">
                   <li>
                      <a href="{{ $social->facebook }}" class="facebook" target="_blank">
                      <i class='bx bxl-facebook'></i>
                      </a>
                   </li>
                   <li>
                      <a href="{{ $social->instagram }}" class="twitter" target="_blank">
                      <i class='bx bxl-instagram'></i>
                      </a>
                   </li>
                   <li>
                      <a href="{{ $social->linkedin }}" class="pinterest" target="_blank">
                      <i class='bx bxl-linkedin'></i>
                      </a>
                   </li>
                   <li>
                      <a href="{{ $social->twitter }}" class="linkedin" target="_blank">
                      <i class='bx bxl-twitter'></i>
                      </a>
                   </li>
                   <li>
                      <a href="{{ $social->youtube }}" class="linkedin" target="_blank">
                      <i class='bx bxl-youtube'></i>
                      </a>
                   </li>
                </ul>
             </div>
          </div>

          @php
              $all_data = DB::table('posts')->orderBy('id', 'desc')->limit(3)->get();
            //   dd($all_data);
          @endphp

          <div class="col-lg-3 col-md-6">
             <div class="single-footer-widget">
                @if(session()->get('lang') == 'english')
                <h2>Recent post</h2>
                @else
                <h2>সাম্প্রতিক পোস্ট</h2>
                @endif

                @foreach($all_data as $data)
                <div class="post-content">
                   <div class="row align-items-center">
                      <div class="col-md-4">
                         <div class="post-image">
                            <a href="#">
                            <img src="{{ URL::to($data->image) }}" alt="image">
                            </a>
                         </div>
                      </div>
                      <div class="col-md-8">
                         <h4>
                            <a href="{{ route('post.view', $data->slug_en) }}">
                                @if(session()->get('lang') == 'english')
                                {{ Str::words($data->title_en, 6, '...') }}
                                @else
                                {{ Str::words($data->title_ban, 6, '...') }}
                                @endif
                            </a>
                         </h4>
                         <span>{{ date('d M Y', strtotime($data->post_date)) }}</span>
                      </div>
                   </div>
                </div>
                @endforeach
             </div>
          </div>
          <div class="col-lg-3 col-md-6">
             <div class="single-footer-widget">
                @if(session()->get('lang') == 'english')
                <h2>Useful links</h2>
                @else
                <h2>দরকারী লিংক</h2>
                @endif
                <ul class="useful-links-list">
                   <li>
                      <a href="{{ route('contact.page') }}">
                        @if(session()->get('lang') == 'english')
                        Contact us
                        @else
                        যোগাযোগ করুন
                        @endif
                      </a>
                   </li>
                   <li>
                      <a href="#">
                        @if(session()->get('lang') == 'english')
                        Privacy & policy
                        @else
                        গোপনীয়তা নীতি
                        @endif

                      </a>
                   </li>
                   <li>
                      <a href="#">
                          @if(session()->get('lang') == 'english')
                          Terms & conditions
                          @else
                          নিয়ম ও শর্তাবলী
                          @endif
                      </a>
                   </li>
                </ul>
             </div>
          </div>
          <div class="col-lg-3 col-md-6">
             <div class="single-footer-widget">
                @if(session()->get('lang') == 'english')
                <h2>Subscribe</h2>
                @else
                <h2>সাবস্ক্রাইব করুন</h2>
                @endif
                <div class="widget-subscribe-content">
                    @if(session()->get('lang') == 'english')
                   <p>Subscribe to our newsletter to get the new updates!</p>
                   @else
                   <p>নতুন আপডেট পেতে আমাদের নিউজলেটার সাবস্ক্রাইব করুন!</p>
                   @endif
                   <form class="newsletter-form">
                      <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required>
                      <button type="submit">Subscribe</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
</section>
<div class="copyright-area">
    <div class="container">
       <div class="copyright-area-content">
          <p>
             Copyright © 2022 Chandlee News. All Rights Reserved by
             <a href="https://techdynobd.com/" target="_blank">TechdynoBD</a>
          </p>
       </div>
    </div>
</div>
