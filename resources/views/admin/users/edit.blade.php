@extends('layouts.admin')
@section('title',"Edit Profile")
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <section id="sizing">  
                <div class="row">
                 
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                          <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-content collpase show">
                        <div class="card-body">
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                          <form class="form" method ="post" action="{{route('admin.user.update')}}">
                            @csrf
                            @method('put')
                            <div class="form-body">
                              <h4 class="form-section"><i class="ft-user"></i>Personal Information</h4>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="userinput1" >Username</label>
                                    <input type="text" id="userinput1" class="form-control" placeholder="Username" name="name" value="{{$user->name}}">
                                    @error("name")
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror  
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="userinput2" >Phone</label>
                                    <input type="text" id="userinput2" class="form-control" placeholder="Phone" name="phone" value="{{$user->phone}}">
                                    @error("phone")
                                      <span class="text-danger"> {{ $message }} </span>
                                    @enderror  
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="userinput3" >E-mail</label>
                                    <input type="text" id="userinput3" class="form-control" placeholder="E-mail" name="email" value="{{$user->email}}">
                                    @error("email")
                                      <span class="text-danger"> {{ $message }} </span>
                                    @enderror  
                                  </div>
                                </div>
                              </div>

                              <h4 class="form-section"><i class="la la-key"></i>Password</h4>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput4">Old Password</label>
                                        <input type="password" id="userinput4" class="form-control" placeholder="old password" name="old_password">
                                        @error("old_password")
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror  
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput4">New Password</label>
                                        <input type="password" id="userinput4" class="form-control" placeholder="New Password" name="password">
                                        @error("password")
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror 
                                        </div>
                                </div>

                                <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="userinput4" >New Password Confirmation</label>
                                        <input type="password" id="userinput4" class="form-control" placeholder="New Password Confirmation" name="password_confirmation">
                                        @error("old_password")
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror 
                                    </div>
                                </div>
                              </div>


                              <div class="form-actions right">
                                <button type="submit" class="btn btn-primary float-right mb-2">
                                    Update
                                </button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </section>
        </div>
    </div>

@endsection
