<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('backend/') }}/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('backend/') }}/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('backend/') }}/assets/images/faces/face15.jpg" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
              <span>{{ Auth::user()->email }}</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>


      @if(Auth::user()->category == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Categories</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('categories') }}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('subcategories') }}">SubCategory</a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      @if(Auth::user()->tag == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#tags" aria-expanded="false" aria-controls="tags">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title">Tags</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tags">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('tags') }}"> Tags </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      @if(Auth::user()->district == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#district" aria-expanded="false" aria-controls="district">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title">Districts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="district">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('districts') }}"> District </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('subdistricts') }}"> SubDistrict </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif


      @if(Auth::user()->post == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="posts">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title">Posts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="posts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('add.post') }}"> Add Post </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('posts') }}"> All Post </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      @if(Auth::user()->setting == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="settings">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('social.setting') }}"> Social Setting </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('seo.setting') }}"> Seo Setting </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('prayer.setting') }}"> Prayer Setting </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('livetv.setting') }}"> LiveTv Setting </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('notice.setting') }}"> Notice Setting </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      @if(Auth::user()->website == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#website" aria-expanded="false" aria-controls="website">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">website</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="website">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('websites') }}"> Websites </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      @if(Auth::user()->gallery == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#photos" aria-expanded="false" aria-controls="photos">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Gallery</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="photos">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('photo.gallery') }}"> Photo Gallery </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('video.gallery') }}"> Video Gallery </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      @if(Auth::user()->ads == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ads" aria-expanded="false" aria-controls="ads">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Advertisement</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ads">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('ads.list') }}"> Ads List </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      @if(Auth::user()->role == 1)
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
          </span>
          <span class="menu-title">User Roles</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('add.writer') }}"> Add Writer </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> All Writer </a></li>
          </ul>
        </div>
      </li>
      @else

      @endif

      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Form Elements</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Tables</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
          </span>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/icons/mdi.html">
          <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
          </span>
          <span class="menu-title">Icons</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
