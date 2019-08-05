@extends('layout.main')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Edit Map
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Maps</li>
                <li><a class="link-effect" href="../">Create</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Register Forms -->
    <h2 class="content-heading">Edit Map</h2>
    <div class="row">
        <div class="col-lg-6">
            <!-- Bootstrap Register -->
            <div class="block block-themed">
                <div class="block-header bg-success">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Maps</h3>
                </div>
                <div class="block-content">
                    {!! Form::model($map,["method"=>"PATCH","action" => ['MapsController@update',$map->id],"class"=>"form-horizontal push-5-t"]) !!}
                       <div class="form-group">
                            {!! Form::label("restaurant_name","Restaurant *",["class"=>"col-xs-12","for"=>"country_id"]) !!}
                            <div class="col-sm-12">
                                {!! Form::select('restaurant_id',  (['0' => '--Select Restaurant--'] + $restaurants),null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("Address","Address",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("address",null,["class"=>"form-control","placeholder"=>"Enter map Address.."]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("lat","Latitude",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("lat",null,["class"=>"form-control","placeholder"=>"Enter map Latitude.."]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("lng","Longitude",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("lng",null,["class"=>"form-control","placeholder"=>"Enter map Longitude.."]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <!-- <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i> Add</button> -->
                                {!! Form::submit("Update map",["class"=>"btn btn-sm btn-success"]) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END Bootstrap Register -->
        </div>
    </div>    
</div>
<!-- END Page Content -->

@include ('errors.list')

@stop