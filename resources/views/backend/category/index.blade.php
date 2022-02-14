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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Category Page</h4>
                <div class="template-demo">
                    <a href="#" class="btn btn-primary btn-fw float-right">+ Add Category</a>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Category English </th>
                        <th> Category Bangla </th>
                        <th> Amount </th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($all_data as $data)
                      <tr>
                        <td> {{ $loop->index+1 }} </td>
                        <td> {{ $data->category_en }} </td>
                        <td> {{ $data->category_ban }} </td>
                        <td>
                            <a href="#" class="btn btn-info btn-fw">Edit</a>
                            <a href="#" class="btn btn-danger btn-fw">Delete</a>
                        </td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
