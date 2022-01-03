@extends('admin.layouts.app')

@section('content')


<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>All Orders</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="style-3" class="table style-3  table-hover">
                        <thead>
                            <tr>
                                <th> Record Id </th>
                                <th>Merchant Name</th>
                                <th>Product Name</th>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>Total Price</th>
                                  <th>Quantity</th>
                                  <th>Options</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                          @php
                                $n = 0;
                          @endphp
                            @if($orders)
                              @foreach($orders as $order)
                                 @php $n++;  @endphp
                            <tr>
                                <td> {{ $n }} </td>
                                <td>{{$order->product->user->name}}</td>
                                <td>{{$order->product->name}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>

                                <td>{{$order->total}}</td>
                                <td>{{$order->qty}}</td>
                                <td>
                                  <?php
                                 foreach (json_decode($order->option_ids) as $key => $value) {
                                   // code...
                                   echo $key . ':' . $value . '</br>';
                                 }
                                 ?>
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
