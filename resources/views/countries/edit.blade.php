@extends('layout.main')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Add Country
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Countries</li>
                <li><a class="link-effect" href="../">Create</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Register Forms -->
    <h2 class="content-heading">Edit Country</h2>
    <div class="row">
        <div class="col-lg-4">
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
                    <h3 class="block-title">Countries</h3>
                </div>
                <div class="block-content">
                    {!! Form::model($country,["method"=>"PATCH","action" => ['CountriesController@update',$country->id],"class"=>"form-horizontal push-5-t"]) !!}
                        <div class="form-group">
                           {!! Form::label("name","Country Name :",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("name",null,["class"=>"form-control","placeholder"=>"Enter country name.."]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <!-- <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i> Add</button> -->
                                {!! Form::submit("Update Country",["class"=>"btn btn-sm btn-success"]) !!}
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

@stop