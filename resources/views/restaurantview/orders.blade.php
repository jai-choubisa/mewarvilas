@extends('layout.restaurantview')

@section('content')

<!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               Orders <small>full list.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Restaurant Order</li>
                                <li><a class="link-effect" href="{{ URL::asset('restaurantview.orders') }}">Orders</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Restaurant Orders Information <small>Full</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                           <table class="table table-bordered table-striped js-dataTable-full">
                                
                                <thead>
                                    <tr>
                                        <th class="text-center">Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Contact</th>
                                        <th>Guests</th>
                                        <th>Date</th>
                                        <th>Time</th>

                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->booking_no }}</td>
                                        <td >{{ $order->uname }}</td>
                                        <td >{{ $order->uphone }}</td>
                                        <td >{{ $order->people }}</td>
                                        <td ><?php  echo date("d M Y", strtotime($order->date)); ?></td>
                                        <td >{{ $order->time }}</td>
                                        <td >
                                         {!! Form::open(['method'=>'POST','url'=>['restaurantview/order/cancel',$order->order_id]]) !!}
                                            {!! Form::button('Cancel', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
                                        {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->                   
                </div>
                <!-- END Page Content -->

@stop