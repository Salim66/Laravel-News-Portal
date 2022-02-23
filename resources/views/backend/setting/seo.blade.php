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
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Seo Setting</h4>
                <form class="forms-sample" action="{{ route('update.seo', $data->id) }}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputUsername1">Meta Author</label>
                    <input type="text" class="form-control" name="meta_author" value="{{ $data->meta_author }}">
                  @error('meta_author')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ $data->meta_title }}">
                    @error('meta_title')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Keyword</label>
                    <input type="text" class="form-control" name="meta_keyword" value="{{ $data->meta_keyword }}">
                    @error('meta_keyword')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="summernote" rows="4">{{ $data->meta_description }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Google Analytics</label>
                    <textarea class="form-control" name="google_analytics" rows="4">{{ $data->google_analytics }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Google Verification</label>
                    <input type="text" class="form-control" name="google_verification" value="{{ $data->google_verification }}">
                    @error('google_verification')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Alexa Analytics</label>
                    <textarea class="form-control" name="alexa_analytics" rows="4">{{ $data->alexa_analytics }}</textarea>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection
