@extends('layout.main')

@section('content')

<!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               States <small>full list.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>States</li>
                                <li><a class="link-effect" href="{{ URL::asset('states.index') }}">Index</a></li>
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
                            <h3 class="block-title">States Information <small>Full</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                           <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Country Name</th>
                                        <th>State Name</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($states as $state)
                                    <tr>
                                        <td class="text-center">{{ $state->id }}</td>
                                        <td class="text-center">{{ $state->country }}</td>
                                        <td class="font-w600">{{ $state->name }}</td>
                                        <td class="text-center">
                                            
                                                {!! Form::open(['method'=>'DELETE','route'=>['admin.states.destroy',$state->id]]) !!}
                                                <div class="form-group">
                                                    <a href="{{ URL::asset('admin/states/'.$state->id.'/edit') }}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></a>
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