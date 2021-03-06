@extends('main.home_master')

@section('content')

@php
    $firstBigThumb = DB::table('posts')->where('first_section_thumbnail', 1)
    ->join('categories', 'posts.category_id', 'categories.id')
    ->select('posts.*', 'categories.category_en', 'categories.category_ban')
    ->orderBy('id', 'desc')->first();

    $firstsection = DB::table('posts')->where('first_section', 1)
    ->join('categories', 'posts.category_id', 'categories.id')
    ->select('posts.*', 'categories.category_en', 'categories.category_ban')
    ->orderBy('id', 'desc')->limit(4)->get();

@endphp
<section class="new-news-area">

    @php
        $headline = DB::table('posts')->where('headline', 1)->orderBy('id', 'DESC')->limit(5)->get();
    @endphp

    <!-- Breaking News Tricker -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center breaking-news bg-white_c">
                    <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger_c py-2 text-white px-1 news"><span class="d-flex align-items-center">@if(session()->get('lang') == 'english') Latest News  @else সর্বশেষ নিঊজ @endif</span></div>
                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
                        @foreach($headline as $head)
                        <a href="{{ route('post.view', $head->slug_en) }}">
                        @if(session()->get('lang') === 'english')
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
        </div>
    </div>
    <!-- End Breaking News Tricker -->


    <div class="container">
       <div class="row">
          <div class="col-lg-3">
             @foreach($firstsection as $key => $first)
                @if ($key < 2)
                    <div class="single-new-news">
                        <div class="new-news-image">
                        <a href="{{ route('post.view', $first->slug_en) }}">
                        <img src="{{ URL::to($first->image) }}" alt="image">
                        </a>
                        <div class="new-news-content">
                            @if(session()->get('lang') == 'english')
                            <span>{{ $first->category_en }}</span>
                            @else
                            <span>{{ $first->category_ban }}</span>
                            @endif
                            <h3>
                                <a href="{{ route('post.view', $first->slug_en) }}">
                                    @if(session()->get('lang') == 'english')
                                    {{ $first->title_en }}
                                    @else
                                    {{ $first->title_ban }}
                                    @endif
                                </a>
                            </h3>
                            <p class="post_short_description">
                                @if(session()->get('lang') == 'english')
                                {!! htmlspecialchars_decode($first->short_details_en) !!}
                                @else
                                {!! htmlspecialchars_decode($first->short_details_ban) !!}
                                @endif
                            </p>
                            <p>{{ date('d F Y', strtotime($first->post_date)) }}</p>
                        </div>
                        </div>
                    </div>
                @endif
             @endforeach
          </div>

          <div class="col-lg-6">
             <div class="single-new-news-box">
                <div class="new-news-image">
                   <a href="{{ route('post.view', $firstBigThumb->slug_en) }}">
                   <img src="{{ URL::to($firstBigThumb->image) }}" alt="image">
                   </a>
                   <div class="new-news-content">
                      @if(session()->get('lang') == 'english')
                      <span>{{ $firstBigThumb->category_en }}</span>
                      @else
                      <span>{{ $firstBigThumb->category_ban }}</span>
                      @endif
                      <h3>
                        <a href="{{ route('post.view', $firstBigThumb->slug_en) }}">
                            @if(session()->get('lang') == 'english')
                            {{ $firstBigThumb->title_en }}
                            @else
                            {{ $firstBigThumb->title_ban }}
                            @endif
                        </a>
                      </h3>
                      <p class="post_short_description">
                        @if(session()->get('lang') == 'english')
                        {!! htmlspecialchars_decode($firstBigThumb->short_details_en) !!}
                        @else
                        {!! htmlspecialchars_decode($firstBigThumb->short_details_ban) !!}
                        @endif
                      </p>
                      <p>{{ date('d F Y', strtotime($firstBigThumb->post_date)) }}</p>
                   </div>
                </div>
             </div>
          </div>

          <div class="col-lg-3">
            @foreach($firstsection as $key => $first)
            @if ($key >= 2)
                <div class="single-new-news">
                    <div class="new-news-image">
                    <a href="{{ route('post.view', $first->slug_en) }}">
                    <img src="{{ URL::to($first->image) }}" alt="image">
                    </a>
                    <div class="new-news-content">
                        @if(session()->get('lang') == 'english')
                        <span>{{ $first->category_en }}</span>
                        @else
                        <span>{{ $first->category_ban }}</span>
                        @endif
                        <h3>
                            <a href="{{ route('post.view', $first->slug_en) }}">
                                @if(session()->get('lang') == 'english')
                                {{ $first->title_en }}
                                @else
                                {{ $first->title_ban }}
                                @endif
                            </a>
                        </h3>
                        <p class="post_short_description">
                            @if(session()->get('lang') == 'english')
                            {!! htmlspecialchars_decode($first->short_details_en) !!}
                            @else
                            {!! htmlspecialchars_decode($first->short_details_ban) !!}
                            @endif
                        </p>
                        <p>{{ date('d F Y', strtotime($first->post_date)) }}</p>
                    </div>
                    </div>
                </div>
            @endif
         @endforeach
          </div>
       </div>
    </div>
 </section>

<!-- Add Section -->
@php
    $adds_first = DB::table('ads')->where('type', 2)->first();
@endphp

     @if($adds_first == NULL)

     @else
     <div class="top-header-area bg-ffffff top_add">
        <div class="container">
           <div class="row align-items-center">
              <div class="col-lg-12 text-center">
                <a target="_blank" href="{{ $adds_first->link }}"><img src="{{ URL::to($adds_first->ads) }}" alt="" class="popular_post_ads_img"></a>
              </div>
           </div>
        </div>
     </div>
    @endif

<!-- End Add Section -->


@php

    $video_data = DB::table('videos')->orderBy('id', 'desc')->get();

    $most_popular = DB::table('posts')->orderBy('id', 'desc')->inRandomOrder()->limit(6)->get();

@endphp


 <section class="default-news-area">
    <div class="container">
       <div class="row">
          <div class="col-lg-8">
             <div class="most-popular-news">
                <div class="section-title">
                   @if(session()->get('lang') == 'english')
                   <h2>Most popular</h2>
                   @else
                   <h2>সবচেয়ে জনপ্রিয়</h2>
                   @endif
                </div>
                <div class="row">
                   @foreach($most_popular as $key => $mp)
                   @if($key < 2)
                   @php
                       $category_m  = DB::table('categories')->where('id', $mp->category_id)->first();
                   @endphp
                   <div class="col-lg-6 col-md-6">
                      <div class="single-most-popular-news">
                         <div class="popular-news-image">
                            <a href="{{ route('post.view', $mp->slug_en) }}">
                            <img src="{{ URL::to($mp->image) }}" alt="image">
                            </a>
                         </div>
                         <div class="popular-news-content">
                            @if(session()->get('lang') == 'english')
                            <span>{{ $category_m->category_en }}</span>
                            @else
                            <span>{{ $category_m->category_ban }}</span>
                            @endif
                            <h3>
                                <a href="{{ route('post.view', $mp->slug_en) }}">
                                    @if(session()->get('lang') == 'english')
                                    {{ $mp->title_en }}
                                    @else
                                    {{ $mp->title_ban }}
                                    @endif
                                </a>
                            </h3>
                            <p class="post_short_description">
                                @if(session()->get('lang') == 'english')
                                {!! htmlspecialchars_decode($mp->short_details_en) !!}
                                @else
                                {!! htmlspecialchars_decode($mp->short_details_ban) !!}
                                @endif
                            </p>
                            <p>{{ date('d F, Y', strtotime($mp->post_date)) }}</p>
                         </div>
                      </div>
                   </div>
                   @endif
                   @endforeach

                   @foreach($most_popular as $key => $mp)
                   @if($key >= 2)
                   @php
                       $category_m  = DB::table('categories')->where('id', $mp->category_id)->first();
                   @endphp
                   <div class="col-lg-6">
                      <div class="most-popular-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="post-image">
                                  <a href="{{ route('post.view', $mp->slug_en) }}">
                                  <img src="{{ URL::to($mp->image) }}" class="small_image" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="post-content">
                                    @if(session()->get('lang') == 'english')
                                    <span>{{ $category_m->category_en }}</span>
                                    @else
                                    <span>{{ $category_m->category_ban }}</span>
                                    @endif
                                    <h3>
                                        <a href="{{ route('post.view', $mp->slug_en) }}">
                                            @if(session()->get('lang') == 'english')
                                            {{ $mp->title_en }}
                                            @else
                                            {{ $mp->title_ban }}
                                            @endif
                                        </a>
                                    </h3>
                                    <p class="post_short_description">
                                        @if(session()->get('lang') == 'english')
                                        {!! htmlspecialchars_decode($mp->short_details_en) !!}
                                        @else
                                        {!! htmlspecialchars_decode($mp->short_details_ban) !!}
                                        @endif
                                    </p>
                                    <p>{{ date('d F, Y', strtotime($mp->post_date)) }}</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   @endif
                   @endforeach
                </div>
             </div>
             <div class="video-news">
                <div class="section-title">
                   @if(session()->get('lang') == 'english')
                   <h2>Video Gallery</h2>
                   @else
                   <h2>ভিডিও সংগ্রহশালা</h2>
                   @endif
                </div>
                <div class="video-slides owl-carousel owl-theme">
                    @foreach($video_data as $video)
                   <div class="video-item">
                      <div class="video-news-image">
                         <div class="ratio ratio-16x9 video_gallery">
                            {!! htmlspecialchars_decode($video->video) !!}
                          </div>
                      </div>
                      <div class="video-news-content">
                         <h3>
                            @if(session()->get('lang') == 'english')
                            {{ $video->title_en }}
                            @else
                            {{ $video->title_ban }}
                            @endif
                         </h3>
                         <span>{{ date('d F, Y', strtotime($video->post_date)) }}</span>
                      </div>
                   </div>
                   @endforeach
                </div>
             </div>


            <!-- Add Section -->
            @php
                $adds_second = DB::table('ads')->where('type', 2)->skip(1)->first();
            @endphp

            @if($adds_second == NULL)

            @else
            <div class="default-news-area">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a target="_blank" href="{{ $adds_second->link }}"><img src="{{ URL::to($adds_second->ads) }}" alt="" class="antorjatik_ads_img"></a>
                    </div>
                </div>
            </div>
            @endif
            <!-- End Add Section -->


             @php

                 $firstCategory = DB::table('categories')->first();

                 $first_cat_big_data = DB::table('posts')->where('category_id', $firstCategory->id)
                    ->where('bigthumbnail', 1)
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                    ->orderBy('id', 'desc')->first();

                 $first_cat_small_data = DB::table('posts')->where('category_id', $firstCategory->id)
                    ->where('bigthumbnail', null)
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                    ->orderBy('id', 'desc')->limit(3)->get();

             @endphp

             <div class="politics-news">
                <div class="section-title">
                   @if(session()->get('lang') == 'english')
                   <h2>{{ $firstCategory->category_en }}</h2>
                   @else
                   <h2>{{ $firstCategory->category_ban }}</h2>
                   @endif
                </div>
                <div class="row">
                   <div class="col-lg-6">
                      @foreach($first_cat_small_data as $fcsd)
                      <div class="politics-news-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="politics-news-image">
                                  <a href="{{ route('post.view', $fcsd->slug_en) }}">
                                  <img src="{{ URL::to($fcsd->image) }}" class="small_image" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="politics-news-content">
                                  <h3>
                                    <a href="{{ route('post.view', $fcsd->slug_en) }}">
                                        @if(session()->get('lang') == 'english')
                                        {{ $fcsd->title_en }}
                                        @else
                                        {{ $fcsd->title_ban }}
                                        @endif
                                    </a>
                                  </h3>
                                  <p class="post_short_description">
                                    @if(session()->get('lang') == 'english')
                                    {!! htmlspecialchars_decode($fcsd->short_details_en) !!}
                                    @else
                                    {!! htmlspecialchars_decode($fcsd->short_details_ban) !!}
                                    @endif
                                  </p>
                                  <p>{{ date('d F, Y', strtotime($fcsd->post_date)) }}</p>
                               </div>
                            </div>
                         </div>
                       </div>
                      @endforeach
                   </div>

                   <div class="col-lg-6">
                      <div class="single-politics-news">
                         <div class="politics-news-image">
                            <a href="{{ route('post.view', $first_cat_big_data->slug_en) }}">
                            <img src="{{ URL::to($first_cat_big_data->image) }}" class="big_image" alt="image">
                            </a>
                         </div>
                         <div class="politics-news-content">
                            @if(session()->get('lang') == 'english')
                            <span>{{ $first_cat_big_data->category_en }}</span>
                            @else
                            <span>{{ $first_cat_big_data->category_ban }}</span>
                            @endif
                            <h3>
                                <a href="{{ route('post.view', $first_cat_big_data->slug_en) }}">
                                    @if(session()->get('lang') == 'english')
                                    {{ $first_cat_big_data->title_en }}
                                    @else
                                    {{ $first_cat_big_data->title_ban }}
                                    @endif
                                </a>
                            </h3>
                            <p class="post_short_description">
                                @if(session()->get('lang') == 'english')
                                {!! htmlspecialchars_decode($first_cat_big_data->short_details_en) !!}
                                @else
                                {!! htmlspecialchars_decode($first_cat_big_data->short_details_ban) !!}
                                @endif
                            </p>
                            <p><a href="#">{{ $first_cat_big_data->name }}</a> / {{ date('d F, Y', strtotime($first_cat_big_data->post_date)) }}</p>
                         </div>
                      </div>
                   </div>

                </div>
             </div>

             @php

                $secondCategory = DB::table('categories')->skip(1)->first();

                $second_cat_small_data = DB::table('posts')->where('category_id', $secondCategory->id)
                    ->where('bigthumbnail', null)
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                    ->orderBy('id', 'desc')->limit(3)->get();

            @endphp

             <div class="business-news">
                <div class="section-title">
                   @if(session()->get('lang') == 'english')
                   <h2>{{ $secondCategory->category_en }}</h2>
                   @else
                   <h2>{{ $secondCategory->category_ban }}</h2>
                   @endif
                </div>
                <div class="business-news-slides owl-carousel owl-theme">

                   @foreach($second_cat_small_data as $scsd)
                   <div class="single-business-news">
                      <div class="business-news-image">
                         <a href="{{ route('post.view', $scsd->slug_en) }}">
                         <img src="{{ URL::to($scsd->image) }}" alt="image">
                         </a>
                      </div>
                      <div class="business-news-content">
                        @if(session()->get('lang') == 'english')
                        <span>{{ $secondCategory->category_en }}</span>
                        @else
                        <span>{{ $secondCategory->category_ban }}</span>
                        @endif
                         <h3>
                            <a href="{{ route('post.view', $scsd->slug_en) }}">
                                @if(session()->get('lang') == 'english')
                                {{ $scsd->title_en }}
                                @else
                                {{ $scsd->title_ban }}
                                @endif
                            </a>
                         </h3>
                         <p class="post_short_description">
                            @if(session()->get('lang') == 'english')
                            {!! htmlspecialchars_decode($scsd->short_details_en) !!}
                            @else
                            {!! htmlspecialchars_decode($scsd->short_details_ban) !!}
                            @endif
                         </p>
                         <p><a href="#">{{ $scsd->name }}</a> / {{ date('d F, Y', strtotime($scsd->post_date)) }}</p>
                      </div>
                   </div>
                   @endforeach

                </div>
             </div>


             @php

                 $thirdCategory = DB::table('categories')->skip(2)->first();

                 $third_cat_big_data = DB::table('posts')->where('category_id', $thirdCategory->id)
                    ->where('bigthumbnail', 1)
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                    ->orderBy('id', 'desc')->first();

                 $third_cat_small_data = DB::table('posts')->where('category_id', $thirdCategory->id)
                    ->where('bigthumbnail', null)
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                    ->orderBy('id', 'desc')->limit(3)->get();

             @endphp


             <div class="culture-news">
                <div class="section-title">
                    @if(session()->get('lang') == 'english')
                    <h2>{{ $thirdCategory->category_en }}</h2>
                    @else
                    <h2>{{ $thirdCategory->category_ban }}</h2>
                    @endif
                 </div>
                 <div class="row">
                    <div class="col-lg-6">
                       @foreach($third_cat_small_data as $tcsd)
                       <div class="politics-news-post">
                          <div class="row align-items-center">
                             <div class="col-lg-4 col-sm-4">
                                <div class="politics-news-image">
                                   <a href="{{ route('post.view', $tcsd->slug_en) }}">
                                   <img src="{{ URL::to($tcsd->image) }}" class="small_image" alt="image">
                                   </a>
                                </div>
                             </div>
                             <div class="col-lg-8 col-sm-8">
                                <div class="politics-news-content">
                                   <h3>
                                     <a href="{{ route('post.view', $tcsd->slug_en) }}">
                                         @if(session()->get('lang') == 'english')
                                         {{ $tcsd->title_en }}
                                         @else
                                         {{ $tcsd->title_ban }}
                                         @endif
                                     </a>
                                   </h3>
                                   <p class="post_short_description">
                                    @if(session()->get('lang') == 'english')
                                    {!! htmlspecialchars_decode($tcsd->short_details_en) !!}
                                    @else
                                    {!! htmlspecialchars_decode($tcsd->short_details_ban) !!}
                                    @endif
                                   </p>
                                   <p>{{ date('d F, Y', strtotime($tcsd->post_date)) }}</p>
                                </div>
                             </div>
                          </div>
                        </div>
                       @endforeach
                    </div>

                    <div class="col-lg-6">
                       <div class="single-politics-news">
                          <div class="politics-news-image">
                             <a href="{{ route('post.view', $third_cat_big_data->slug_en) }}">
                             <img src="{{ URL::to($third_cat_big_data->image) }}" class="big_image" alt="image">
                             </a>
                          </div>
                          <div class="politics-news-content">
                             @if(session()->get('lang') == 'english')
                             <span>{{ $third_cat_big_data->category_en }}</span>
                             @else
                             <span>{{ $third_cat_big_data->category_ban }}</span>
                             @endif
                             <h3>
                                 <a href="{{ route('post.view', $third_cat_big_data->slug_en) }}">
                                     @if(session()->get('lang') == 'english')
                                     {{ $third_cat_big_data->title_en }}
                                     @else
                                     {{ $third_cat_big_data->title_ban }}
                                     @endif
                                 </a>
                             </h3>
                             <p class="post_short_description">
                                @if(session()->get('lang') == 'english')
                                {!! htmlspecialchars_decode($third_cat_big_data->short_details_en) !!}
                                @else
                                {!! htmlspecialchars_decode($third_cat_big_data->short_details_ban) !!}
                                @endif
                             </p>
                             <p><a href="#">{{ $third_cat_big_data->name }}</a> / {{ date('d F, Y', strtotime($third_cat_big_data->post_date)) }}</p>
                          </div>
                       </div>
                    </div>

                 </div>
             </div>


             @php

                 $fourCategory = DB::table('categories')->skip(3)->first();


                 $four_cat_small_data = DB::table('posts')->where('category_id', $fourCategory->id)
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                    ->orderBy('id', 'desc')->limit(3)->get();

             @endphp


             <div class="row">
                <div class="col-lg-6">
                   <div class="section-title">
                    @if(session()->get('lang') == 'english')
                    <h2>{{ $fourCategory->category_en }}</h2>
                    @else
                    <h2>{{ $fourCategory->category_ban }}</h2>
                    @endif
                   </div>
                   <div class="sports-slider owl-carousel owl-theme">

                      <div class="sports-item">
                        @foreach($four_cat_small_data as $fcsd)
                         <div class="single-sports-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="sports-news-image">
                                     <a href="{{ route('post.view', $fcsd->slug_en) }}">
                                     <img src="{{ URL::to($fcsd->image) }}" class="small_image" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="sports-news-content">
                                     <h3>
                                        <a href="{{ route('post.view', $fcsd->slug_en) }}">
                                            @if(session()->get('lang') == 'english')
                                            {{ $fcsd->title_en }}
                                            @else
                                            {{ $fcsd->title_ban }}
                                            @endif
                                        </a>
                                     </h3>
                                     <p class="post_short_description">
                                        @if(session()->get('lang') == 'english')
                                        {!! htmlspecialchars_decode($fcsd->short_details_en) !!}
                                        @else
                                        {!! htmlspecialchars_decode($fcsd->short_details_ban) !!}
                                        @endif
                                     </p>
                                     <p>{{ date('d F Y', strtotime($fcsd->post_date)) }}</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                        @endforeach
                      </div>

                   </div>
                </div>


                @php

                    $fiveCategory = DB::table('categories')->skip(4)->first();


                    $five_cat_small_data = DB::table('posts')->where('category_id', $fiveCategory->id)
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                    ->orderBy('id', 'desc')->limit(6)->get();

                @endphp


                <div class="col-lg-6">
                   <div class="section-title">
                        @if(session()->get('lang') == 'english')
                        <h2>{{ $fiveCategory->category_en }}</h2>
                        @else
                        <h2>{{ $fiveCategory->category_ban }}</h2>
                        @endif
                   </div>
                   <div class="tech-slider owl-carousel owl-theme">
                      <div class="tech-item">
                        @foreach($five_cat_small_data as $key => $fivcsd)
                        @if($key < 3)
                        <div class="single-sports-news">
                           <div class="row align-items-center">
                              <div class="col-lg-4">
                                 <div class="sports-news-image">
                                    <a href="{{ route('post.view', $fivcsd->slug_en) }}">
                                    <img src="{{ URL::to($fivcsd->image) }}" class="small_image" alt="image">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-8">
                                 <div class="sports-news-content">
                                    <h3>
                                       <a href="{{ route('post.view', $fivcsd->slug_en) }}">
                                           @if(session()->get('lang') == 'english')
                                           {{ $fivcsd->title_en }}
                                           @else
                                           {{ $fivcsd->title_ban }}
                                           @endif
                                       </a>
                                    </h3>
                                    <p class="post_short_description">
                                        @if(session()->get('lang') == 'english')
                                        {!! htmlspecialchars_decode($fivcsd->short_details_en) !!}
                                        @else
                                        {!! htmlspecialchars_decode($fivcsd->short_details_ban) !!}
                                        @endif
                                    </p>
                                    <p>{{ date('d F Y', strtotime($fivcsd->post_date)) }}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                       @endforeach
                      </div>
                      <div class="tech-item">
                        @foreach($five_cat_small_data as $key => $fivcsd)
                        @if($key >= 3)
                        <div class="single-sports-news">
                           <div class="row align-items-center">
                              <div class="col-lg-4">
                                 <div class="sports-news-image">
                                    <a href="{{ route('post.view', $fivcsd->slug_en) }}">
                                    <img src="{{ URL::to($fivcsd->image) }}" class="small_image" alt="image">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-lg-8">
                                 <div class="sports-news-content">
                                    <h3>
                                       <a href="{{ route('post.view', $fivcsd->slug_en) }}">
                                           @if(session()->get('lang') == 'english')
                                           {{ $fivcsd->title_en }}
                                           @else
                                           {{ $fivcsd->title_ban }}
                                           @endif
                                       </a>
                                    </h3>
                                    <p class="post_short_description">
                                        @if(session()->get('lang') == 'english')
                                        {!! htmlspecialchars_decode($fivcsd->short_details_en) !!}
                                        @else
                                        {!! htmlspecialchars_decode($fivcsd->short_details_ban) !!}
                                        @endif
                                    </p>
                                    <p>{{ date('d F Y', strtotime($fivcsd->post_date)) }}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                       @endforeach
                      </div>
                   </div>
                </div>
             </div>

             <!-- Add Section -->
            @php
                $adds_ban = DB::table('ads')->where('type', 2)->skip(2)->first();
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


             @php

                $sixCategory = DB::table('categories')->skip(5)->first();


                $six_cat_small_data = DB::table('posts')->where('category_id', $sixCategory->id)
                ->join('categories', 'posts.category_id', 'categories.id')
                ->join('users', 'posts.user_id', 'users.id')
                ->select('posts.*', 'categories.category_en', 'categories.category_ban', 'users.name')
                ->orderBy('id', 'desc')->limit(6)->get();

            @endphp

             <div class="health-news">
                <div class="section-title">
                    @if(session()->get('lang') == 'english')
                    <h2>{{ $sixCategory->category_en }}</h2>
                    @else
                    <h2>{{ $sixCategory->category_ban }}</h2>
                    @endif
                </div>
                <div class="health-news-slides owl-carousel owl-theme">
                   @foreach($six_cat_small_data as $key => $sixcsd)
                   <div class="single-health-news">
                      <div class="health-news-image">
                         <a href="{{ route('post.view', $sixcsd->slug_en) }}">
                         <img src="{{ URL::to($sixcsd->image) }}" alt="image">
                         </a>
                      </div>
                      <div class="health-news-content">
                        @if(session()->get('lang') == 'english')
                        <span>{{ $sixCategory->category_en }}</span>
                        @else
                        <span>{{ $sixCategory->category_ban }}</span>
                        @endif
                         <h3>
                            <a href="{{ route('post.view', $sixcsd->slug_en) }}">
                                @if(session()->get('lang') == 'english')
                                {{ $sixcsd->title_en }}
                                @else
                                {{ $sixcsd->title_ban }}
                                @endif
                            </a>
                         </h3>
                         <p class="post_short_description">
                            @if(session()->get('lang') == 'english')
                            {!! htmlspecialchars_decode($sixcsd->short_details_en) !!}
                            @else
                            {!! htmlspecialchars_decode($sixcsd->short_details_ban) !!}
                            @endif
                         </p>
                         <p><a href="#">{{ $sixcsd->name }}</a> / {{ date('d F, Y', strtotime($sixcsd->post_date)) }}</p>
                      </div>
                   </div>
                   @endforeach
                </div>
             </div>

             @php

                $photo_big_data = DB::table('photos')
                    ->where('type', 1)
                    ->orderBy('id', 'desc')->first();

                $photo_small_data = DB::table('photos')
                    ->where('type', 0)
                    ->orderBy('id', 'desc')->limit(3)->get();

            @endphp


                <div class="culture-news mt-5">
                    <div class="section-title">
                        @if(session()->get('lang') == 'english')
                        <h2>Photo Gallery</h2>
                        @else
                        <h2>ফটো গ্যালারি</h2>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        @foreach($photo_small_data as $tcsd)
                        <div class="politics-news-post">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="politics-news-image">
                                    <a href="javascript:void(0)">
                                    <img src="{{ URL::to($tcsd->photo) }}" class="small_image" alt="image">
                                    </a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <div class="politics-news-content">
                                    <h3>
                                        <a href="javascript:void(0)">
                                            @if(session()->get('lang') == 'english')
                                            {{ $tcsd->title_en }}
                                            @else
                                            {{ $tcsd->title_ban }}
                                            @endif
                                        </a>
                                    </h3>
                                    <p>{{ date('d F, Y', strtotime($tcsd->post_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        @endforeach
                        </div>

                        <div class="col-lg-6">
                        <div class="single-politics-news">
                            <div class="politics-news-image">
                                <a href="#">
                                <img src="{{ URL::to($photo_big_data->photo) }}" class="big_image" alt="image">
                                </a>
                            </div>
                            <div class="politics-news-content">
                                <h3>
                                    <a href="javascript:void(0)">
                                        @if(session()->get('lang') == 'english')
                                        {{ $photo_big_data->title_en }}
                                        @else
                                        {{ $photo_big_data->title_ban }}
                                        @endif
                                    </a>
                                </h3>
                                <p>{{ date('d F, Y', strtotime($photo_big_data->post_date)) }}</p>
                            </div>
                        </div>
                        </div>

                    </div>
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
                @php
                    $livetv = DB::table('livetvs')->first();
                @endphp
                @if($livetv->status == 1)
                <section class="widget widget_featured_reports">
                   @if(session()->get('lang') == 'english')
                   <h3 class="widget-title">Live TV</h3>
                   @else
                   <h3 class="widget-title">সরাসরি সম্প্রচার</h3>
                   @endif
                   <div class="single-featured-reports">
                      <div class="featured-reports-image">
                          <div class="ratio ratio-16x9">
                            {!! htmlspecialchars_decode($livetv->embed_code) !!}
                          </div>
                      </div>
                   </div>
                </section>
                @endif

                @php
                    $date = \Carbon\Carbon::now()->format('d-m-Y');
                    $latest_post = DB::table('posts')->where('post_date', $date)->orderBy('id', 'desc')->limit(10)->get();
                    // dd($latest_post);
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


                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


                <!-- Ads Section -->
                @php
                $adds_v_one = DB::table('ads')->where('type', 1)->first();
                @endphp

                @if($adds_v_one == NULL)

                @else
                <section class="widget widget_most_shared">
                <div class="single-most-shared">
                <div class="most-shared-image">
                    <a target="_blank" href="{{ $adds_v_one->link }}">
                    <img src="{{ URL::to($adds_v_one->ads) }}" alt="image" class="sidebar_ads_image">
                    </a>
                </div>
                </div>
                </section>
                @endif
                <!-- End Ads Section -->


                @php
                    $district = DB::table('districts')->get();
                @endphp



                <section class="widget widget_newsletter">
                   <div class="newsletter-content">
                       @if(session()->get('lang') == 'english')
                      <h3>Search By District</h3>
                      @else
                      <h3>জেলা দ্বারা অনুসন্ধান</h3>
                      @endif
                   </div>
                   <form action="{{ route('district.search') }}" method="POST">
                       @csrf
                       <div class="row">
                           <div class="col-md-12">
                                <div class="form-group">
                                    <select name="district_id" class="form-control" id="exampleSelectGender">
                                        <option disabled selected>- Select District -</option>
                                        @foreach($district as $district)
                                        <option value="{{ $district->id }}">{{ $district->district_en }} | {{ $district->district_ban }}</option>
                                        @endforeach

                                    </select>
                                    @error('district_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <select name="subdistrict_id" class="form-control district_sub">

                                    </select>
                                </div>
                           </div>
                           <div class="col-md-12">
                                <div class="form-group">
                                    <button class="district_button" type="submit">Search</button>
                                </div>
                           </div>
                       </div>
                   </form>
                </section>

                <!-- Date Wise Search -->
                <section class="widget widget_newsletter">
                   <div class="newsletter-content">
                       @if(session()->get('lang') == 'english')
                      <h3>Search By Date</h3>
                      @else
                      <h3>তারিখ দ্বারা অনুসন্ধান</h3>
                      @endif
                   </div>
                   <form action="{{ route('date-search') }}" method="POST">
                       @csrf
                       <div class="row">
                           <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">@if(session()->get('lang') == 'english') Start Date @else শুরুর তারিখ @endif</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>
                           </div><br>
                           <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">@if(session()->get('lang') == 'english') End Date @else শেষ তারিখ @endif</label>
                                    <input type="date" name="end_date" class="form-control">
                                </div>
                           </div>
                           <div class="col-md-12">
                                <div class="form-group">
                                    <button class="district_button" type="submit">Search</button>
                                </div>
                           </div>
                       </div>
                   </form>
                </section>


                @php
                    $prayer = DB::table('prayers')->first();
                @endphp
                <section class="widget widget_popular_posts_thumb">
                   @if(session()->get('lang') == 'english')
                   <h3 class="widget-title">Prayer Time</h3>
                   @else
                   <h3 class="widget-title">নামাজের সময়</h3>
                   @endif
                   <div>
                     <table class="table">
                         <tr>
                             <th>
                                @if(session()->get('lang') == 'english')
                                Fajar
                                @else
                                ফজর
                                @endif
                             </th>
                             <th>{{ $prayer->fojr }}</th>
                         </tr>
                         <tr>
                             <th>
                                @if(session()->get('lang') == 'english')
                                Dhuhr
                                @else
                                যুহর
                                @endif
                             </th>
                             <th>{{ $prayer->johor }}</th>
                         </tr>
                         <tr>
                             <th>
                                @if(session()->get('lang') == 'english')
                                Asr
                                @else
                                আসর
                                @endif
                             </th>
                             <th>{{ $prayer->asor }}</th>
                         </tr>
                         <tr>
                             <th>
                                @if(session()->get('lang') == 'english')
                                Maghrib
                                @else
                                মাগরিব
                                @endif
                             </th>
                             <th>{{ $prayer->magrib }}</th>
                         </tr>
                         <tr>
                             <th>
                                @if(session()->get('lang') == 'english')
                                Isha
                                @else
                                ইশা
                                @endif
                             </th>
                             <th>{{ $prayer->eaha }}</th>
                         </tr>
                         <tr>
                             <th>
                                @if(session()->get('lang') == 'english')
                                Jummah
                                @else
                                জুম্মা
                                @endif
                             </th>
                             <th>{{ $prayer->jummah }}</th>
                         </tr>
                     </table>
                   </div>
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

                <!-- Ads Section -->
                @php
                    $adds_v_two = DB::table('ads')->where('type', 1)->skip(1)->first();
                @endphp

                @if($adds_v_two == NULL)

                @else
                <section class="widget widget_most_shared">
                    <div class="single-most-shared">
                    <div class="most-shared-image">
                        <a target="_blank" href="{{ $adds_v_two->link }}">
                        <img src="{{ URL::to($adds_v_two->ads) }}" alt="image" class="sidebar_ads_image">
                        </a>
                    </div>
                    </div>
                </section>
                @endif

                {{-- <section class="widget widget_instagram">
                   <h3 class="widget-title">Instagram</h3>
                   <ul>
                      <li>
                         <div class="box">
                            <img src="{{ asset('frontend/') }}/assets/img/latest-news/latest-news-1.jpg" alt="image">
                            <i class="bx bxl-instagram"></i>
                            <a href="#" target="_blank" class="link-btn"></a>
                         </div>
                      </li>
                      <li>
                         <div class="box">
                            <img src="{{ asset('frontend/') }}/assets/img/latest-news/latest-news-2.jpg" alt="image">
                            <i class="bx bxl-instagram"></i>
                            <a href="#" target="_blank" class="link-btn"></a>
                         </div>
                      </li>
                      <li>
                         <div class="box">
                            <img src="{{ asset('frontend/') }}/assets/img/latest-news/latest-news-3.jpg" alt="image">
                            <i class="bx bxl-instagram"></i>
                            <a href="#" target="_blank" class="link-btn"></a>
                         </div>
                      </li>
                      <li>
                         <div class="box">
                            <img src="{{ asset('frontend/') }}/assets/img/latest-news/latest-news-4.jpg" alt="image">
                            <i class="bx bxl-instagram"></i>
                            <a href="#" target="_blank" class="link-btn"></a>
                         </div>
                      </li>
                      <li>
                         <div class="box">
                            <img src="{{ asset('frontend/') }}/assets/img/latest-news/latest-news-5.jpg" alt="image">
                            <i class="bx bxl-instagram"></i>
                            <a href="#" target="_blank" class="link-btn"></a>
                         </div>
                      </li>
                      <li>
                         <div class="box">
                            <img src="{{ asset('frontend/') }}/assets/img/latest-news/latest-news-6.jpg" alt="image">
                            <i class="bx bxl-instagram"></i>
                            <a href="#" target="_blank" class="link-btn"></a>
                         </div>
                      </li>
                   </ul>
                </section> --}}

                @php
                    $websites = DB::table('websites')->limit(5)->get();
                @endphp
                <!-- Inportant Website -->
                <section class="widget widget_instagram">
                    @if(session()->get('lang') == 'english')
                    <h3 class="widget-title">Important Websites</h3>
                    @else
                    <h3 class="widget-title">গুরুত্বপূর্ণ ওয়েবসাইট</h3>
                    @endif
                    <article class="item">
                        @foreach($websites as $website)
                        <div class="info">
                           {{ $loop->index+1 }}. <a href="{{ $website->website_link }}" target="_blank">{{ $website->website_name }}</a>
                        </div>
                        @endforeach
                     </article>
                 </section>
             </aside>
          </div>
       </div>
    </div>
 </section>


@endsection
