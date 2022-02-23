@extends('main.home_master')

@section('content')
<section class="new-news-area">
    <div class="container">
       <div class="row">
          <div class="col-lg-3">
             <div class="single-new-news">
                <div class="new-news-image">
                   <a href="#">
                   <img src="{{ asset('frontend/') }}/assets/img/new-news/new-news-1.jpg" alt="image">
                   </a>
                   <div class="new-news-content">
                      <span>Politics</span>
                      <h3>
                         <a href="#">All the highlights from western fashion week summer 2021</a>
                      </h3>
                      <p>28 September 2021</p>
                   </div>
                </div>
             </div>
             <div class="single-new-news">
                <div class="new-news-image">
                   <a href="#">
                   <img src="{{ asset('frontend/') }}/assets/img/new-news/new-news-2.jpg" alt="image">
                   </a>
                   <div class="new-news-content">
                      <span>Business</span>
                      <h3>
                         <a href="#">Follow some simple rules to invest money in any business</a>
                      </h3>
                      <p>28 September 2021</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-6">
             <div class="single-new-news-box">
                <div class="new-news-image">
                   <a href="#">
                   <img src="{{ asset('frontend/') }}/assets/img/new-news/new-news-3.jpg" alt="image">
                   </a>
                   <div class="new-news-content">
                      <span>World news</span>
                      <h3>
                         <a href="#">More than 1 million people have died of coronavirus worldwide so far, so people are becoming aware</a>
                      </h3>
                      <p>28 September 2021</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-3">
             <div class="daily-briefing-item">
                <div class="title">
                   <h3>Daily briefing</h3>
                </div>
                <div class="daily-briefing-content">
                   <span>Sports</span>
                   <h4>
                      <a href="#">Who is ahead in the final of the women’s world cup football match</a>
                   </h4>
                   <p>28 September 2021</p>
                </div>
                <div class="daily-briefing-content">
                   <span>Technology</span>
                   <h4>
                      <a href="#">A team of British troops is constantly monitoring cyber attacks</a>
                   </h4>
                   <p>28 September 2021</p>
                </div>
                <div class="daily-briefing-content">
                   <span>Culture</span>
                   <h4>
                      <a href="#">Entertainment activists started again a few months later</a>
                   </h4>
                   <p>28 September 2021</p>
                </div>
                <div class="daily-briefing-content">
                   <span>World news</span>
                   <h4>
                      <a href="#">Differences between user experience interface</a>
                   </h4>
                   <p>28 September 2021</p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="default-news-area">
    <div class="container">
       <div class="row">
          <div class="col-lg-8">
             <div class="most-popular-news">
                <div class="section-title">
                   <h2>Most popular</h2>
                </div>
                <div class="row">
                   <div class="col-lg-6 col-md-6">
                      <div class="single-most-popular-news">
                         <div class="popular-news-image">
                            <a href="#">
                            <img src="{{ asset('frontend/') }}/assets/img/most-popular/most-popular-1.jpg" alt="image">
                            </a>
                         </div>
                         <div class="popular-news-content">
                            <span>Politics</span>
                            <h3>
                               <a href="#">The Prime Minister’s said that selfish nations are constantly dying for their won interests</a>
                            </h3>
                            <p><a href="#">Patricia</a> / 28 September, 2021</p>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-6 col-md-6">
                      <div class="single-most-popular-news">
                         <div class="popular-news-image">
                            <a href="#">
                            <img src="{{ asset('frontend/') }}/assets/img/most-popular/most-popular-7.jpg" alt="image">
                            </a>
                         </div>
                         <div class="popular-news-content">
                            <span>Premer league</span>
                            <h3>
                               <a href="#">Manchester United’s dream of winning by a goal was fulfilled</a>
                            </h3>
                            <p><a href="#">Gonzalez</a> / 28 September, 2021</p>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="most-popular-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="post-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/most-popular/most-popular-3.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="post-content">
                                  <span>Culture</span>
                                  <h3>
                                     <a href="#">As well as stopping goals, Christiane Endler is opening.</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="most-popular-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="post-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/most-popular/most-popular-4.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="post-content">
                                  <span>Technology</span>
                                  <h3>
                                     <a href="#">The majority of news published online presents more videos</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="most-popular-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="post-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/most-popular/most-popular-5.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="post-content">
                                  <span>Business</span>
                                  <h3>
                                     <a href="#">This movement aims to establish women’s rights.</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="most-popular-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="post-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/most-popular/most-popular-6.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="post-content">
                                  <span>Politics</span>
                                  <h3>
                                     <a href="#">Trump discusses various issues with his party’s political leaders.</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="video-news">
                <div class="section-title">
                   <h2>Top video</h2>
                </div>
                <div class="video-slides owl-carousel owl-theme">
                   <div class="video-item">
                      <div class="video-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/video-news/video-news-4.jpg" alt="image">
                         </a>
                         <a href="https://www.youtube.com/watch?v=UG8N5JT4QLc" class="popup-youtube">
                         <i class='bx bx-play-circle'></i>
                         </a>
                      </div>
                      <div class="video-news-content">
                         <h3>
                            <a href="#">Apply these 10 secret techniques to improve travel</a>
                         </h3>
                         <span>28 September, 2021</span>
                      </div>
                   </div>
                   <div class="video-item">
                      <div class="video-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/video-news/video-news-2.jpg" alt="image">
                         </a>
                         <a href="https://www.youtube.com/watch?v=UG8N5JT4QLc" class="popup-youtube">
                         <i class='bx bx-play-circle'></i>
                         </a>
                      </div>
                      <div class="video-news-content">
                         <h3>
                            <a href="#">The lazy man’s guide to travel you to our moms</a>
                         </h3>
                         <span>28 September, 2021</span>
                      </div>
                   </div>
                   <div class="video-item">
                      <div class="video-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/video-news/video-news-3.jpg" alt="image">
                         </a>
                         <a href="https://www.youtube.com/watch?v=UG8N5JT4QLc" class="popup-youtube">
                         <i class='bx bx-play-circle'></i>
                         </a>
                      </div>
                      <div class="video-news-content">
                         <h3>
                            <a href="#">Sony laptops are still part of the sony family</a>
                         </h3>
                         <span>28 September, 2021</span>
                      </div>
                   </div>
                </div>
             </div>
             <div class="politics-news">
                <div class="section-title">
                   <h2>Politics</h2>
                </div>
                <div class="row">
                   <div class="col-lg-6">
                      <div class="politics-news-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="politics-news-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/politics-news/politics-news-2.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="politics-news-content">
                                  <h3>
                                     <a href="#">Politically, new riots have started inside the country</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="politics-news-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="politics-news-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/politics-news/politics-news-3.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="politics-news-content">
                                  <h3>
                                     <a href="#">Public discussion in 5 major issues</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="politics-news-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="politics-news-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/politics-news/politics-news-4.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="politics-news-content">
                                  <h3>
                                     <a href="#">Preparations are being made in a new way for the elections</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="single-politics-news">
                         <div class="politics-news-image">
                            <a href="#">
                            <img src="{{ asset('frontend/') }}/assets/img/politics-news/politics-news-5.jpg" alt="image">
                            </a>
                         </div>
                         <div class="politics-news-content">
                            <span>Politics</span>
                            <h3>
                               <a href="#">Organizing conference among our selves to make it better financially</a>
                            </h3>
                            <p><a href="#">Jonson Steven</a> / 28 September, 2021</p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="business-news">
                <div class="section-title">
                   <h2>Business</h2>
                </div>
                <div class="business-news-slides owl-carousel owl-theme">
                   <div class="single-business-news">
                      <div class="business-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/business-news/business-news-3.jpg" alt="image">
                         </a>
                      </div>
                      <div class="business-news-content">
                         <span>Business</span>
                         <h3>
                            <a href="#">We have to make a business plan while maintaining mental heatlh during this epidemic</a>
                         </h3>
                         <p><a href="#">Patricia</a> / 28 September, 2021</p>
                      </div>
                   </div>
                   <div class="single-business-news">
                      <div class="business-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/business-news/business-news-4.jpg" alt="image">
                         </a>
                      </div>
                      <div class="business-news-content">
                         <span>News</span>
                         <h3>
                            <a href="#">Many people are established today by doing ecommerce business during the time of Corona</a>
                         </h3>
                         <p><a href="#">Sanford</a> / 28 September, 2021</p>
                      </div>
                   </div>
                   <div class="single-business-news">
                      <div class="business-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/business-news/business-news-3.jpg" alt="image">
                         </a>
                      </div>
                      <div class="business-news-content">
                         <span>Business</span>
                         <h3>
                            <a href="#">We have to make a business plan while maintaining mental heatlh during this epidemic</a>
                         </h3>
                         <p><a href="#">Patricia</a> / 28 September, 2021</p>
                      </div>
                   </div>
                   <div class="single-business-news">
                      <div class="business-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/business-news/business-news-4.jpg" alt="image">
                         </a>
                      </div>
                      <div class="business-news-content">
                         <span>News</span>
                         <h3>
                            <a href="#">Many people are established today by doing ecommerce business during the time of Corona</a>
                         </h3>
                         <p><a href="#">Sanford</a> / 28 September, 2021</p>
                      </div>
                   </div>
                </div>
             </div>
             <div class="culture-news">
                <div class="section-title">
                   <h2>Culture</h2>
                </div>
                <div class="row">
                   <div class="col-lg-6">
                      <div class="culture-news-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="culture-news-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/culture-news/culture-news-2.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="culture-news-content">
                                  <h3>
                                     <a href="#">Working in the garden is a tradition for women</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="culture-news-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="culture-news-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/culture-news/culture-news-3.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="culture-news-content">
                                  <h3>
                                     <a href="#">The fashion that captures the lives of women</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="culture-news-post">
                         <div class="row align-items-center">
                            <div class="col-lg-4 col-sm-4">
                               <div class="culture-news-image">
                                  <a href="#">
                                  <img src="{{ asset('frontend/') }}/assets/img/culture-news/culture-news-4.jpg" alt="image">
                                  </a>
                               </div>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                               <div class="culture-news-content">
                                  <h3>
                                     <a href="#">A group of artists performed music in a group way</a>
                                  </h3>
                                  <p>28 September, 2021</p>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="single-culture-news">
                         <div class="culture-news-image">
                            <a href="#">
                            <img src="{{ asset('frontend/') }}/assets/img/culture-news/culture-news-1.jpg" alt="image">
                            </a>
                         </div>
                         <div class="culture-news-content">
                            <span>Culture</span>
                            <h3>
                               <a href="#">Entertainment activists started again a few months later</a>
                            </h3>
                            <p><a href="#">Steven</a> / 28 September, 2021</p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-lg-6">
                   <div class="section-title">
                      <h2>Sports</h2>
                   </div>
                   <div class="sports-slider owl-carousel owl-theme">
                      <div class="sports-item">
                         <div class="single-sports-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="sports-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/sports-news/sports-news-1.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="sports-news-content">
                                     <h3>
                                        <a href="#">Start a new men’s road World Championships</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-sports-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="sports-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/sports-news/sports-news-2.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="sports-news-content">
                                     <h3>
                                        <a href="#">He look the first wicket with the first ball in this IPL</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-sports-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="sports-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/sports-news/sports-news-3.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="sports-news-content">
                                     <h3>
                                        <a href="#">The last time of the match is goning on</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="sports-item">
                         <div class="single-sports-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="sports-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/sports-news/sports-news-1.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="sports-news-content">
                                     <h3>
                                        <a href="#">Start a new men’s road World Championships</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-sports-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="sports-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/sports-news/sports-news-2.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="sports-news-content">
                                     <h3>
                                        <a href="#">He look the first wicket with the first ball in this IPL</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-sports-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="sports-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/sports-news/sports-news-3.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="sports-news-content">
                                     <h3>
                                        <a href="#">The last time of the match is goning on</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-lg-6">
                   <div class="section-title">
                      <h2>Tech</h2>
                   </div>
                   <div class="tech-slider owl-carousel owl-theme">
                      <div class="tech-item">
                         <div class="single-tech-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="tech-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/tech-news/tech-news-1.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="tech-news-content">
                                     <h3>
                                        <a href="#">5 more phones have come to the market with features.</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-tech-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="tech-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/tech-news/tech-news-2.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="tech-news-content">
                                     <h3>
                                        <a href="#">Like humans, the new robot has a lot of memory power</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-tech-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="tech-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/tech-news/tech-news-3.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="tech-news-content">
                                     <h3>
                                        <a href="#">All new gadgets are being made in technology</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tech-item">
                         <div class="single-tech-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="tech-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/tech-news/tech-news-1.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="tech-news-content">
                                     <h3>
                                        <a href="#">5 more phones have come to the market with features.</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-tech-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="tech-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/tech-news/tech-news-2.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="tech-news-content">
                                     <h3>
                                        <a href="#">Like humans, the new robot has a lot of memory power</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="single-tech-news">
                            <div class="row align-items-center">
                               <div class="col-lg-4">
                                  <div class="tech-news-image">
                                     <a href="#">
                                     <img src="{{ asset('frontend/') }}/assets/img/tech-news/tech-news-3.jpg" alt="image">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-lg-8">
                                  <div class="tech-news-content">
                                     <h3>
                                        <a href="#">All new gadgets are being made in technology</a>
                                     </h3>
                                     <p>28 September, 2021</p>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="health-news">
                <div class="section-title">
                   <h2>Health</h2>
                </div>
                <div class="health-news-slides owl-carousel owl-theme">
                   <div class="single-health-news">
                      <div class="health-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/health-news/health-news-3.jpg" alt="image">
                         </a>
                      </div>
                      <div class="health-news-content">
                         <span>Health</span>
                         <h3>
                            <a href="#">At present, diseases have become the main obstacle for children to get out healthy</a>
                         </h3>
                         <p><a href="#">Tikelo</a> / 28 September, 2021</p>
                      </div>
                   </div>
                   <div class="single-health-news">
                      <div class="health-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/health-news/health-news-4.jpg" alt="image">
                         </a>
                      </div>
                      <div class="health-news-content">
                         <span>Fitness</span>
                         <h3>
                            <a href="#">Morning yoga is very important for maintaining good physical fitness</a>
                         </h3>
                         <p><a href="#">Patricia</a> / 28 September, 2021</p>
                      </div>
                   </div>
                   <div class="single-health-news">
                      <div class="health-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/health-news/health-news-3.jpg" alt="image">
                         </a>
                      </div>
                      <div class="health-news-content">
                         <span>Health</span>
                         <h3>
                            <a href="#">At present, diseases have become the main obstacle for children to get out healthy</a>
                         </h3>
                         <p><a href="#">Tikelo</a> / 28 September, 2021</p>
                      </div>
                   </div>
                   <div class="single-health-news">
                      <div class="health-news-image">
                         <a href="#">
                         <img src="{{ asset('frontend/') }}/assets/img/health-news/health-news-4.jpg" alt="image">
                         </a>
                      </div>
                      <div class="health-news-content">
                         <span>Fitness</span>
                         <h3>
                            <a href="#">Morning yoga is very important for maintaining good physical fitness</a>
                         </h3>
                         <p><a href="#">Patricia</a> / 28 September, 2021</p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4">
             <aside class="widget-area">
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
                <section class="widget widget_latest_news_thumb">
                   <h3 class="widget-title">Latest news</h3>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg1" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Negotiations on a peace agreement between the two countries</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg2" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Love songs helped me through heartbreak</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg3" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">This movement aims to establish women rights</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg4" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Giving special powers to police officers to prevent crime</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg5" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Copy paste the style of your element Newspaper</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg6" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Take the tour to explore the new header manager</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg7" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">As well as stopping goals, Christiane Endler is opening.</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg8" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">These are the 10 colors Set to dominate fashion week</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg9" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Spotted! what the editors wore to fashion week fall</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg10" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">As well as stopping goals for an, cristiane endler is opening</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
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
                         <img src="{{ asset('frontend/') }}/assets/img/most-shared/most-shared-2.jpg" alt="image">
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
                <section class="widget widget_popular_posts_thumb">
                   <h3 class="widget-title">Popular posts</h3>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg1" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Match between United States and England at AGD stadium</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg2" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">For the last time, he addressed the people</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg3" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">The coronavairus is finished and the outfit is busy</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg4" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">A fierce battle is going on between the two in the game</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
                   <article class="item">
                      <a href="#" class="thumb">
                      <span class="fullimage cover bg5" role="img"></span>
                      </a>
                      <div class="info">
                         <h4 class="title usmall"><a href="#">Negotiations on a peace agreement between the two countries</a></h4>
                         <span>28 September, 2021</span>
                      </div>
                   </article>
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
                </section>

                @php
                    $websites = DB::table('websites')->get();
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
                           <a href="{{ $website->website_link }}">{{ $website->website_name }}</a>
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
