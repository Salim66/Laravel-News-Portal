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
                <h4 class="card-title">Edit Photo Gallery</h4>
                <form class="forms-sample" action="{{ route('update.photo.gallery', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputUsername1">Title English</label>
                            <input type="text" class="form-control" name="title_en" placeholder="Title English" value="{{ $data->title_en }}">
                            @error('title_en')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Title Bangla</label>
                            <input type="text" class="form-control" name="title_ban" placeholder="Title Bangla" value="{{ $data->title_ban }}">
                            @error('title_ban')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Photo Upload <small class="text-danger">( Image Length 1000 x 650 )</small></label>
                            <input type="file" name="photo" class="form-control">
                            @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img src="{{ URL::to($data->photo) }}" height="100" width="120" alt="">
                            <input type="hidden" name="old_photo" value="{{ $data->photo }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">Select Type</label>
                            <select name="type" class="form-control" id="exampleSelectGender">
                            <option value="1" {{ $data->type == 1 ? 'selected' : '' }}>Big Photo</option>
                            <option value="0" {{ $data->type == 0 ? 'selected' : '' }}>Small Photo</option>
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
