@extends('admin.layouts.app')

@section('content')


<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>All Products</h4>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-12 col-md-12 col-sm-12 col-12">
                          <button id="add-work-platforms" onclick="window.location.href='/dashboard/products/create'" class="btn btn-primary">Add</button>
                  </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="style-3" class="table style-3  table-hover">
                        <thead>
                            <tr>
                                <th> Record Id </th>
                                <th>Name </th>

                                <th>Provider Name</th>
                                <th>Price</th>
                                <th>Details</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                                $n = 0;
                          @endphp
                            @if($products)
                              @foreach($products as $product)
                                 @php $n++;  @endphp
                            <tr>
                                <td> {{ $n }} </td>
                                <td>{{$product->name}}</td>

                                <td>{{$product->user->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->details}}</td>


                                <td class="text-center">
                                    <span><img src="/uploads/{{$product->img}}" class="profile-img" alt="avatar"></span>
                                </td>

                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="{{ url('dashboard/products/'.$product->id.'/edit') }}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                      
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
