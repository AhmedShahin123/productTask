
@extends('admin.layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                            <div class="info">
                                <h6 class="">Order {{$order->id}} Details</h6>

                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">

                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                  <div class="row">
                                                        <div class="col-sm-6  ">
                                                            <div class="form-group">
                                                                <label for="fullName">Order Number</label>
                                                                <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->id}}" disabled>

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6  ">
                                                            <div class="form-group">
                                                                <label for="fullName">User Name</label>
                                                                <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->user->name}}" disabled>

                                                            </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                            <div class="col-sm-6  ">
                                                                <div class="form-group">
                                                                    <label for="fullName">Provider Name</label>
                                                                    <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->provider->name}}" disabled>

                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6  ">
                                                                <div class="form-group">
                                                                    <label for="fullName">Order Status</label>
                                                                    <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->status}}" disabled>

                                                                </div>
                                                            </div>
                                                          </div>

                                                          <div class="row">
                                                                <div class="col-sm-6  ">
                                                                    <div class="form-group">
                                                                        <label for="fullName">Order Date</label>
                                                                        <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->created_at->diffForHumans()}}" disabled>

                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6  ">
                                                                    <div class="form-group">
                                                                        <label for="fullName">Order Remaining</label>
                                                                        <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->remaining}}" disabled>

                                                                    </div>
                                                                </div>
                                                              </div>

                                                              <div class="row">
                                                                    <div class="col-sm-6  ">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Order User Note</label>
                                                                            <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->notes}}" disabled>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6  ">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Order Price</label>
                                                                            <input type="text" class="form-control mb-4" id="email" name="name_en" placeholder="Name En" value="{{$order->total}}" disabled>

                                                                        </div>
                                                                    </div>
                                                                  </div>

                                                                    <button type="submit" class="btn btn-primary mt-3" onclick="window.location.href='/dashboard/orders'">Back</button>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>



                </div>
            </div>
        </div>


    </div>

</div>

@endsection
