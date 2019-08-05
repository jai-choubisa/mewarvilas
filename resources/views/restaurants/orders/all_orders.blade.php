@extends('layout.main')

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
                                <li>Orders</li>
                                <li><a class="link-effect" href="{{ URL::asset('admin/restaurant-orders') }}">Index</a></li>
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
                            <h3 class="block-title">Orders Information <small>Full</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                           <?php //var_dump($orders);exit; ?>
                           <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Booking Id</th>
                                        <th>Restaurant Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td class="text-center">{{ $order->booking_no }}</td>
                                        <td class="font-w600">{{ $order->restaurant_name }}</td>
                                        <td class="font-w600">{{ $order->uname }}</td>
                                        <td class="font-w600">{{ $order->email }}</td>
                                        <td class="font-w600">{{ $order->phone }}</td>
                                        <td class="font-w600">{{ $order->date }}</td>
                                        <td class="font-w600">{{ $order->time }}</td>

                                        <td class="text-center">
                                            
                                                {!! Form::open(['method'=>'POST','url'=>['admin/order/cancel',$order->order_id]]) !!}
                                                <div class="form-group">
                                                    {!! Form::button('Cancel', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
                                                </div>
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