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
                <h4 class="card-title">Update User Profile</h4>
                <form class="forms-sample" action="{{ route('update.ads', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputUsername1">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputUsername1">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{ $data->mobile }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputUsername1">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $data->address }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputUsername1">Position</label>
                            <input type="text" class="form-control" name="position" value="{{ $data->position }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleSelectGender">Gender</label>
                            <select name="gender" class="form-control" id="exampleSelectGender">
                               <option selected disabled>-Select Gender-</option>
                               <option value="Male" {{ $data->type == "Male" ? 'selected' : '' }}>Male</option>
                               <option value="Female" {{ $data->type == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Image Upload</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Old Image</label>
                            <input type="hidden" name="old_image" value="{{ $data->image }}">

                            <img id="show_image" src="{{ (!empty($data->image)) ? URL::to($data->image) : URL::to('/upload/no_image.jpg') }}" height="100" width="100" alt="">
                        </div>

                    </div>


                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
