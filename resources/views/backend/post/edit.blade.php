@extends('admin.admin_master')

@section('admin')

@php
    $subcat = DB::table('subcategories')->where('category_id', $data->category_id)->get();
    $subdist = DB::table('subdistricts')->where('district_id', $data->district_id)->get();
    // dd($subcat);

@endphp

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
                <h4 class="card-title">Edit Post</h4>
                <form class="forms-sample" action="{{ route('update.post', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="old_image" value="{{ $data->image }}" class="form-control">

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
                            <input type="text" class="form-control" name="title_ban" placeholder="Title Bangla"  value="{{ $data->title_ban }}">
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
                            <option value="{{ $cat->id }}" {{ $cat->id == $data->category_id ? 'selected' : '' }}>{{ $cat->category_en }} | {{ $cat->category_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">SubCategory</label>
                            <select name="subcategory_id" class="form-control" id="exampleSelectGender">
                            @foreach($subcat as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $data->subcategory_id ? 'selected' : '' }}>{{ $cat->subcategory_en }} | {{ $cat->subcategory_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">District</label>
                            <select name="district_id" class="form-control" id="exampleSelectGender">
                            <option disabled selected>- Select District -</option>
                            @foreach($district as $district)
                            <option value="{{ $district->id }}" {{ $district->id == $data->district_id ? 'selected' : '' }}>{{ $district->district_en }} | {{ $district->district_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">SubDistrict</label>
                            <select name="subdistrict_id" class="form-control" id="exampleSelectGender">
                            @foreach($subdist as $district)
                            <option value="{{ $district->id }}" {{ $district->id == $data->subdistrict_id ? 'selected' : '' }}>{{ $district->subdistrict_en }} | {{ $district->subdistrict_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleSelectGender">Tag</label>
                            <select name="tag_id" class="form-control" id="exampleSelectGender">
                            <option disabled selected>- Select Tag -</option>
                            @foreach($tag as $ta)
                            <option value="{{ $ta->id }}" {{ $ta->id == $data->tag_id ? 'selected' : '' }}>{{ $ta->tag_en }} | {{ $ta->tag_ban }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Image Upload <small class="text-danger">( Image Length 1000 x 650 )</small></label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ URL::to($data->image) }}" height="60px" width="80px" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleTextarea1">Details English</label>
                            <textarea class="form-control" name="details_en" id="summernote" rows="4">{{ $data->details_en }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleTextarea1">Details Bangla</label>
                            <textarea class="form-control" name="details_ban" id="summernote1" rows="4">{{ $data->details_ban }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-center">Extra Options</h4><br>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" name="headline" class="form-check-input" value="1" {{ ($data->headline == 1? 'checked' : '') }}> Headline <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1" {{ ($data->bigthumbnail == 1? 'checked' : '') }}> Genarel Big Thumbnail <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" name="first_section" class="form-check-input" value="1" {{ ($data->first_section == 1? 'checked' : '') }}> First Section <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1" {{ ($data->first_section_thumbnail == 1? 'checked' : '') }}> First Section Thumbnail <i class="input-helper"></i></label>
                            </div>
                        </div>
                    </div>

                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        // SubCategory get by categroy
        $('select[name="category_id"]').change(function(){
            let category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url: '/get/subcategory/' + category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="subcategory_id"]').append(`
                            <option value='${value.id}'>${value.subcategory_en} | ${value.subcategory_ban}</option>
                            `);
                        });
                    }
                });
            }else {
                alert('danger');
            }

        })

        // SubDistrict get by district
        $('select[name="district_id"]').change(function(){
            let district_id = $(this).val();

            if(district_id){
                $.ajax({
                    url: '/get/subdistrict/' + district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        $('select[name="subdistrict_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="subdistrict_id"]').append(`
                            <option value='${value.id}'>${value.subdistrict_en} | ${value.subdistrict_ban}</option>
                            `);
                        });
                    }
                });
            }else {
                alert('danger');
            }

        })
    });
</script>

@endsection
