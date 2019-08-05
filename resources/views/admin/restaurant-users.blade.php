@extends('layout.main')

@section('content')

<!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               Restaurant Users <small>full list.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Home</li>
                                <li>Users</li>
                                <li><a class="link-effect" href="{{ URL::asset('admin/restaurant-users') }}">Restaurant Users</a></li>
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
                            <h3 class="block-title">Restaurant Users Information <small>Full</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                           <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td class="font-w600">{{ $user->name }}</td>
                                        <td class="font-w600">{{ $user->email }}</td>
                                        <td class="font-w600">{{ $user->phone }}</td>
                                        <td class="font-w600">{{ $user->created_at }}</td>
                                        <td class="font-w600">{{ $user->active }}</td>
                                        <td class="text-center">
                                            {!! Form::open(['method'=>'POST','url'=>['admin/user/delete',$user->id]]) !!}
                                            <div class="form-group">
                                                <a href="{{ URL::asset('admin/user-status/'.$user->id.'/'.$user->active) }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Change Status"><i class="fa fa-exchange"></i></a>
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