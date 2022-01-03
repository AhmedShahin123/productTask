
@extends('admin.layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                      {!! Form::model($user,['method'=>'patch', 'action'=>['Admin\UsersController@update',$user],'files'=>true, 'class' => 'section general-info', 'id' => 'general-info']) !!}

                          @csrf
                            <div class="info">
                                <h6 class="">Edit User</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" name="avatar" id="input-file-max-fs" class="dropify" data-default-file="assets/img/200x200.jpg" data-max-file-size="2M" />
                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Name</label>
                                                                <input type="text" class="form-control mb-4" id="fullName" name="name" placeholder="Name" value="{{$user->name}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Email</label>
                                                                <input type="text" class="form-control mb-4" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Phone</label>
                                                                <input type="text" class="form-control mb-4" id="mobile" name="phone" placeholder="Phone" value="{{$user->phone}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Password</label>
                                                                <input type="password" class="form-control mb-4" id="password" placeholder="password" name="password" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                        <label class="switch s-icons s-outline s-outline-default mr-2">
                                                            <input type="checkbox" checked name="active" value="1">
                                                            <span class="slider round">Active</span>
                                                        </label>
                                                      </div>
                                                      </div>

                                                      <button type="submit" class="btn btn-primary mt-3">Submit</button>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>



                </div>
            </div>
        </div>


    </div>

</div>

@endsection
