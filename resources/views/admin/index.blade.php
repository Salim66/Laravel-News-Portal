@extends('admin.admin_master')

@section('admin')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
              <div class="row align-items-center">
                <div class="col-4 col-sm-3 col-xl-2">
                  <img src="{{ asset('backend/') }}/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                </div>
                <div class="col-5 col-sm-7 col-xl-8 p-0">
                  <h4 class="mb-1 mb-sm-0">Welcome To Chandlee News</h4>
                </div>
                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                  <span>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Visit Frontend ?</a>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


    @php
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->get();
        $post = DB::table('posts')->get();
        $ads = DB::table('ads')->get();
    @endphp

    <div class="row">

      @if(Auth::user()->category == 1)
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($category) }}</h3>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Category</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Category</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($subcategory) }}</h3>
                  <p class="text-info ml-2 mb-0 font-weight-medium">SubCategory</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-info">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">SubCategory</h6>
          </div>
        </div>
      </div>
      @else

      @endif

     @if(Auth::user()->post == 1)
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($post) }}</h3>
                  <p class="text-danger ml-2 mb-0 font-weight-medium">Post</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-danger">
                  <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Post</h6>
          </div>
        </div>
      </div>
      @else

      @endif

      @if(Auth::user()->ads == 1)
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{ count($ads) }}</h3>
                  <p class="text-warning ml-2 mb-0 font-weight-medium">Advertisement</p>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-warning ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted font-weight-normal">Advertisement</h6>
          </div>
        </div>
      </div>
      @else

      @endif
    </div>
</div>

@endsection
