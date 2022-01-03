@extends('admin.layouts.app')

@section('content')

            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                      <div class="widget widget-one">
                          <div class="widget-heading">
                              <h6 class="">Statistics</h6>
                          </div>
                          <div class="w-chart">






                              <div class="w-chart-section">
                                  <div class="w-detail">
                                      <p class="w-title">Total Products</p>
                                      <p class="w-stats">{{App\Models\Product::count()}}</p>
                                  </div>
                                  <div class="w-chart-render-one">
                                      <div id="paid-visits1"></div>
                                  </div>
                              </div>

                              <div class="w-chart-section">
                                  <div class="w-detail">
                                      <p class="w-title">Total Orders</p>
                                      <p class="w-stats">{{App\Models\Order::count()}}</p>
                                  </div>
                                  <div class="w-chart-render-one">
                                      <div id="paid-visits1"></div>
                                  </div>
                              </div>





                          </div>
                      </div>
                  </div>








                </div>

            </div>

            @endsection
