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
                <h4 class="card-title">Edit Privacy Policy</h4>
                <form class="forms-sample" action="{{ route('update.privacy', $data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Question English</label>
                        <input type="text" class="form-control" name="question_en" value="{{ $data->question_en }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Question Bangla</label>
                        <input type="text" class="form-control" name="question_ban" value="{{ $data->question_ban }}">
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                                <label for="exampleTextarea1">Answer English</label>
                                <textarea class="form-control" name="answer_en" id="summernote" rows="4">{{ $data->answer_en }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="exampleTextarea1">Answer Bangla</label>
                                <textarea class="form-control" name="answer_ban" id="summernote1" rows="4">{{ $data->answer_ban }}</textarea>
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
