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
                <h4 class="card-title">Edit Ads</h4>
                <form class="forms-sample" action="{{ route('update.ads', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputUsername1">Ads Link</label>
                            <input type="text" class="form-control" name="link" placeholder="Ads Link" value="{{ $data->link }}">
                            @error('link')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Ads Image Upload</label>
                            <input type="file" name="ads" class="form-control">
                            @error('ads')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if($data->type == 1)
                            <img src="{{ URL::to($data->ads) }}" height="100" width="120" alt="">
                            @else
                            <img src="{{ URL::to($data->ads) }}" height="90" width="500" alt="">
                            @endif
                            <input type="hidden" name="old_photo" value="{{ $data->ads }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleSelectGender">Ads Type</label>
                            <select name="type" class="form-control" id="exampleSelectGender">
                            <option value="1" {{ $data->type == 1 ? 'selected' : '' }}>Vertical Ads</option>
                            <option value="2" {{ $data->type == 2 ? 'selected' : '' }}>Horizontal Ads</option>
                            </select>
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>



@endsection
