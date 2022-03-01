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
                <h4 class="card-title">Edit Website Setting</h4>
                <form class="forms-sample" action="{{ route('update.websetting', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Website Logo Upload <small class="text-danger">( Logo Length 80 x 80 )</small></label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="hidden" name="old_logo" class="form-control" value="{{ $data->logo }}">
                        <img src="{{ URL::to($data->logo) }}" height="80px" width="80px" alt="">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Address English</label>
                    <input type="text" class="form-control" name="address_en" value="{{ $data->address_en }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Address Bangla</label>
                    <input type="text" class="form-control" name="address_ban" value="{{ $data->address_en }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone English</label>
                    <input type="text" class="form-control" name="phone_en" value="{{ $data->phone_en }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Bangla</label>
                    <input type="text" class="form-control" name="phone_ban" value="{{ $data->phone_ban }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Footer Description English</label>
                    <textarea class="form-control" name="footer_desc_en" id="summernote" rows="4">{{ $data->footer_desc_en }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Footer Description Bangla</label>
                    <textarea class="form-control" name="footer_desc_ban" id="summernote1" rows="4">{{ $data->footer_desc_ban }}</textarea>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection
