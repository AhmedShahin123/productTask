
@extends('admin.layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                      {!! Form::open(['method'=>'POST', 'action'=>'Admin\ProductsAdditionsController@store', 'files'=>true, 'class' => 'section general-info', 'id' => 'general-info']) !!}

                          @csrf
                            <div class="info">
                                <h6 class="">Add New Product Addition</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                          <div class="col-xl-2 col-lg-12 col-md-4">
                                              <div class="upload mt-4 pr-md-4">
                                                  <input type="file" name="img" id="input-file-max-fs" class="dropify" data-default-file="assets/img/200x200.jpg" data-max-file-size="2M" />
                                                  <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload  Image</p>
                                              </div>
                                          </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Option Key Name</label>
                                                                <input type="text" class="form-control mb-4" id="fullName" name="key" placeholder="Key Name" value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Option Value</label>
                                                                <input type="text" class="form-control mb-4" id="email" name="value" placeholder="Value" value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Price</label>
                                                                <input type="text" class="form-control mb-4" id="email" name="price" placeholder="price" value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                              <label for="fullName">Product Name</label>
                                                                <select class="form-control  basic" name="product_id">
                                                                  @foreach($products as $product)
                                                                    <option selected="selected" value="{{$product->id}}">{{$product->name}}</option>

                                                                    @endforeach
                                                                </select>
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
