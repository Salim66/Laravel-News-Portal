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
                <h4 class="card-title">Add New Post</h4>
                <form class="forms-sample" action="{{ route('store.post') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputUsername1">Title English</label>
                            <input type="text" class="form-control" name="title_en" placeholder="Title English">
                            @error('title_en')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Title Bangla</label>
                            <input type="text" class="form-control" name="title_ban" placeholder="Title Bangla">
                            @error('title_ban')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">Category</label>
                            <select name="category_id" class="form-control" id="exampleSelectGender">
                            <option disabled selected>- Select Category -</option>
                            @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_en }} | {{ $cat->category_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">SubCategory</label>
                            <select name="subcategory_id" class="form-control" id="exampleSelectGender">

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">District</label>
                            <select name="district_id" class="form-control" id="exampleSelectGender">
                            <option disabled selected>- Select District -</option>
                            @foreach($district as $district)
                            <option value="{{ $district->id }}">{{ $district->district_en }} | {{ $district->district_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">SubCategory</label>
                            <select name="subcategory_id" class="form-control" id="exampleSelectGender">

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">Tag</label>
                            <select name="tag_id" class="form-control" id="exampleSelectGender">
                            <option disabled selected>- Select Tag -</option>
                            @foreach($tag as $ta)
                            <option value="{{ $ta->id }}">{{ $ta->tag_en }} | {{ $ta->tag_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Image Upload</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleTextarea1">Details English</label>
                            <textarea class="form-control" name="details_en" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleTextarea1">Details Bangla</label>
                            <textarea class="form-control" name="details_ban" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                    </div>


                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection