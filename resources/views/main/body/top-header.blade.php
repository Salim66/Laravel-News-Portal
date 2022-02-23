@php
    $social = DB::table('socials')->first();
@endphp
<div class="top-header-area bg-color">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-lg-6">
             <ul class="top-header-social">
                <li>
                   <a href="{{ $social->facebook }}" class="facebook" target="_blank">
                   <i class='bx bxl-facebook'></i>
                   </a>
                </li>
                <li>
                   <a href="{{ $social->instagram }}" class="pinterest" target="_blank">
                   <i class='bx bxl-instagram'></i>
                   </a>
                </li>
                <li>
                   <a href="{{ $social->linkedin }}" class="pinterest" target="_blank">
                   <i class='bx bxl-linkedin'></i>
                   </a>
                </li>
                <li>
                   <a href="{{ $social->twitter }}" class="twitter" target="_blank">
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
          <div class="col-lg-6">
             <ul class="top-header-others">

                <li>
                   <div class="languages-list">
                    @if(session()->get('lang') == 'bangla')
                    <a href="{{ route('lang.english') }}">English</a>
                    @else
                    <a href="{{ route('lang.bangla') }}">বাংলা</a>
                    @endif
                   </div>
                </li>
                <li>
                   <i class='bx bx-user'></i>
                   <a href="login.html">Login</a>
                </li>
             </ul>
          </div>
       </div>
    </div>
</div>
