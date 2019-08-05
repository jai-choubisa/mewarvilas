@extends('layout.main')

@section('content')

<!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               Events <small>full list.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Events</li>
                                <li><a class="link-effect" href="{{ URL::asset('restaurants.events.index') }}">Index</a></li>
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
                            <h3 class="block-title">Events Information <small>Full</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                           <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Restaurant Name</th>
                                        <th>Event Image</th>
                                        <th>Event Name</th>
                                        <th>Description</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td class="text-center">{{ $event->id }}</td>
                                        <td class="font-w600">{{ $event->restaurant_name }}</td>
                                        <td class="font-w600">{{ $event->image_path }}</td>
                                        <td class="font-w600">{{ $event->name }}</td>
                                        <td class="font-w600">{{ $event->description }}</td>
                                        <td class="text-center">{{ $event->from_date }}</td>
                                        <td class="text-center">{{ $event->to_date }}</td>
                                        <td class="text-center">{{ $event->start_time }}</td>
                                        <td class="text-center">{{ $event->end_time }}</td>

                                        <td class="text-center">
                                            
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.restaurants.events.destroy',$event->id]]) !!}
                                                <div class="form-group">
                                                    <a href="{{ URL::asset('admin/restaurants/events/'.$event->id.'/edit') }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></a>
                                                    {!! Form::button('<i class="fa fa-times"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-default')) !!}
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