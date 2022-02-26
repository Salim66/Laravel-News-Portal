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
                <div class="template-demo">
                    <h4 class="card-title float-left">Post Page</h4>
                    <a href="{{ route('add.post') }}" class="btn btn-primary btn-fw float-right mb-4">+ Add Post</a>
                </div>
                <div class="table-responsive">
                  <table id="table_id" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Post English </th>
                        <th> Category </th>
                        <th> Image </th>
                        <th> Post Date </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($all_data as $data)
                      <tr>
                        <td> {{ $loop->index+1 }} </td>
                        <td> {{ Str::limit($data->title_en, 15, '...') }} </td>
                        <td> {{ $data->category_en }} </td>
                        <td class="text-center"> <img src="{{ $data->image }}" height="70px" width="70px" alt=""> </td>
                        <td> {{ $data->post_date }} </td>
                        <td>
                            <a href="{{ route('edit.post', $data->id) }}" class="btn btn-info">Edit</a>
                            <a id="delete" href="{{ route('delete.post', $data->id) }}" class="btn btn-danger">Delete</a>
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
