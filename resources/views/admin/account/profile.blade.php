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
                <h4 class="card-title">User Profile</h4>

                <a href="{{ route('edit.profile') }}" class="btn btn-success float-right edit_profile">Edit Profile</a>

                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="{{ asset('backend/') }}/assets/images/faces/face15.jpg" alt="Card image cap">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>User Name:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>User Email:</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td>User Mobile:</td>
                                <td>{{ Auth::user()->mobile }}</td>
                            </tr>
                            <tr>
                                <td>User Address:</td>
                                <td>{{ Auth::user()->address }}</td>
                            </tr>
                            <tr>
                                <td>User Gender:</td>
                                <td>{{ Auth::user()->gender }}</td>
                            </tr>
                            <tr>
                                <td>User Position:</td>
                                <td>{{ Auth::user()->position }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

              </div>
            </div>
          </div>
    </div>
</div>



@endsection
