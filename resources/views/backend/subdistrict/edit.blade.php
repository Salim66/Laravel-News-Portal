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
                <h4 class="card-title">Edit SubDistrict</h4>
                <form class="forms-sample" action="{{ route('update.subdistrict', $data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">SubDistrict English</label>
                        <input type="text" class="form-control" name="subdistrict_en" placeholder="SubDistrict English" value="{{ $data->subdistrict_en }}">
                      @error('subdistrict_en')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">SubDistrict Bangla</label>
                        <input type="text" class="form-control" name="subdistrict_ban" placeholder="SubDistrict Bangla" value="{{ $data->subdistrict_ban }}">
                        @error('subdistrict_ban')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">District Select</label>
                        <select name="district_id" class="form-control" id="exampleSelectGender">
                          <option disabled selected>- Select -</option>
                          @foreach($district as $dist)
                          <option value="{{ $dist->id }}" {{ $dist->id == $data->district_id ? 'selected' : '' }}>{{ $dist->district_en }} | {{ $dist->district_ban }}</option>
                          @endforeach
                        </select>
                      </div>

                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection
