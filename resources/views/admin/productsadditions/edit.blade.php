
@extends('admin.layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                      {!! Form::model($productAddition,['method'=>'patch', 'action'=>['Admin\ProductsAdditionsController@update',$productAddition->id],'files'=>true, 'class' => 'section general-info', 'id' => 'general-info']) !!}

                          @csrf
                            <div class="info">
                                <h6 class="">Edit Product Option</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                          <div class="col-xl-2 col-lg-12 col-md-4">
                                              <div class="upload mt-4 pr-md-4">
                                                  <input type="file" name="img" id="input-file-max-fs" class="dropify" data-default-file="/uploads/{{$productAddition->img}}" data-max-file-size="2M" />
                                                  <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Product Image</p>
                                              </div>
                                          </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">

                                                  <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <label for="fullName">Key</label>
                                                          <input type="text" class="form-control mb-4" id="fullName" name="key" placeholder="key" value="{{$productAddition->key}}">
                                                      </div>
                                                  </div>

                                                  <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <label for="fullName">Value</label>
                                                          <input type="text" class="form-control mb-4" id="email" name="value" placeholder="value" value="{{$productAddition->value}}">
                                                      </div>
                                                  </div>

                                                  <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <label for="fullName">Price</label>
                                                          <input type="text" class="form-control mb-4" id="email" name="price" placeholder="price" value="{{$productAddition->price}}">
                                                      </div>
                                                  </div>

                                                  <div class="col-sm-6">
                                                      <div class="form-group">
                                                        <label for="fullName">Product Name</label>
                                                          <select class="form-control  basic" name="product_id">
                                                            <option selected="selected" value="{{$productAddition->product_id}}">
                                                              @if($productAddition->product)
                                                                  {{$productAddition->product->name}}@else
                                                                  @endif</option>
                                                            @foreach($products as $product)
                                                            @if($product->id != $productAddition->product_id)
                                                              <option value="{{$product->id}}">{{$product->name}}</option>
                                                              @endif
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
