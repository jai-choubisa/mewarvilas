@extends('layout.main')

@section('content')

<!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               Restaurants <small>full list.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Restaurants</li>
                                <li><a class="link-effect" href="{{ URL::asset('restaurants.index') }}">Index</a></li>
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
                            <h3 class="block-title">Restaurants Information <small>Full</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                           <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Restaurant Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Banner Image</th>

                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $restaurant->id }}</td>
                                        <td class="text-center">{{ $restaurant->restaurant_name }}</td>
                                        <td class="text-center">{{ $restaurant->address }}</td>
                                        <td class="text-center">{{ $restaurant->phone }}</td>
                                        <td class="text-center"><img src="<?php echo $restaurant->banner_image_path; ?>" width="100" /></td>

                                        <td class="text-center">
                                            
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.restaurants.destroy',$restaurant->id]]) !!}
                                                <div class="form-group">
                                                    <a href="{{ URL::asset('admin/restaurants/'.$restaurant->id.'/edit') }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></a>
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