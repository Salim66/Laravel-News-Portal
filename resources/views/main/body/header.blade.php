@php
    $websetting = DB::table('websitesettings')->first();
@endphp

<div class="navbar-area navbar-two">
    <div class="main-responsive-nav">
       <div class="container">
          <div class="main-responsive-menu">
             <div class="logo">
                <a href="{{ url('/') }}">
                <img src="{{ URL::to($websetting->logo) }}" alt="image">
                </a>
             </div>
          </div>
       </div>
    </div>
    <div class="main-navbar">
       <div class="container">
          <nav class="navbar navbar-expand-md navbar-light">
             <a class="navbar-brand" href="{{ url('/') }}">
             <img src="{{ URL::to($websetting->logo) }}" alt="image">
             </a>
             <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav">
                   <li class="nav-item">
                      <a href="{{ url('/') }}" class="nav-link active">
                    @if(session()->get('lang') == 'english')
                      Home
                    @else
                      হোম
                    @endif
                      </a>
                   </li>
@php
    $categories = DB::table('categories')->orderBy('id', 'ASC')->limit(7)->get();
@endphp

                   @foreach($categories as $cat)
                   <li class="nav-item">
                      <a href="{{ route('category.wise.post', $cat->slug_en) }}" class="nav-link">
                        @if(session()->get('lang') == 'english')
                        {{ $cat->category_en }}
                        @else
                        {{ $cat->category_ban }}
                        @endif

                      {{-- <i class='bx bx-chevron-down'></i> --}}
                      </a>
                      <ul class="dropdown-menu">

                    @php
                        $subcategories = DB::table('subcategories')->where('category_id', $cat->id)->get();
                    @endphp

                        @foreach($subcategories as $subcat)
                         <li class="nav-item">
                            <a href="{{ url('/category/'.$cat->slug_en.'/'.$subcat->slug_en) }}" class="nav-link">
                                @if(session()->get('lang') == 'english')
                                {{ $subcat->subcategory_en }}
                                @else
                                {{ $subcat->subcategory_ban }}
                                @endif
                            </a>
                         </li>
                         @endforeach

                      </ul>
                   </li>
                   @endforeach


                </ul>
                <div class="others-options d-flex align-items-center">
                   <div class="option-item">
                      <form class="search-box" action="{{ route('search') }}" method="POST">
                        @csrf
                         <input type="text" name="search" class="form-control" placeholder="@if(session()->get('lang') == 'english') Search for.. @else অনুসন্ধান করুন.. @endif">
                         <button type="submit"><i class='bx bx-search'></i></button>
                      </form>
                   </div>
                </div>
             </div>
          </nav>
       </div>
    </div>

    <div class="others-option-for-responsive">
       <div class="container">
          <div class="dot-menu">
             <div class="inner">
                <div class="circle circle-one"></div>
                <div class="circle circle-two"></div>
                <div class="circle circle-three"></div>
             </div>
          </div>
          <div class="container">
             <div class="option-inner">
                <div class="others-options d-flex align-items-center">
                   <div class="option-item">
                      <form class="search-box" action="{{ route('search') }}" method="POST">
                        @csrf
                        <input type="text" name="search" class="form-control" placeholder="@if(session()->get('lang') == 'english') Search for.. @else অনুসন্ধান করুন.. @endif">
                        <button type="submit"><i class='bx bx-search'></i></button>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
