@extends('layout.main')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Add Deal
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Deals</li>
                <li><a class="link-effect" href="../">Create</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Register Forms -->
    <h2 class="content-heading">Add Deal</h2>
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
                    <h3 class="block-title">Deals</h3>
                </div>
                <div class="block-content">
                    {!! Form::open(["url" => "admin/restaurants/deals","class"=>"form-horizontal push-5-t"]) !!}
                        <div class="form-group">
                            {!! Form::label("restaurant_name","Restaurant *",["class"=>"col-xs-12","for"=>"country_id"]) !!}
                            <div class="col-sm-12">
                                
                                <?php 
                                    $myrestaurant = array();
                                    $myrestaurant[0] = "--Select Restaurant--"; 
                                    foreach($restaurants as $restaurant){ 
                                        $myrestaurant[$restaurant->id] = $restaurant->restaurant_name;
                                    }
                                ?>
                                {!! Form::select('restaurant_id', $myrestaurant,null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("date","Valid Period",["class"=>"col-md-4 control-label"]) !!}
                            <div class="col-md-8">
                                <div class="input-daterange input-group" id="datepicker" data-date-format="mm/dd/yyyy">
                                    {!! Form::text("from_date",null,["class"=>"form-control","placeholder"=>"From date","id"=>"example-daterange1"]) !!}
                                    <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                    {!! Form::text("to_date",null,["class"=>"form-control","placeholder"=>"Till date","id"=>"example-daterange2"]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("discount","Discount %",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("discount",null,["class"=>"form-control","placeholder"=>"Enter discount e.x 15"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("deal","Deal ",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("deal",null,["class"=>"form-control","placeholder"=>"Enter deal e.x Free Chocalate icecream desert"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <!-- <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i> Add</button> -->
                                {!! Form::submit("Add deal",["class"=>"btn btn-sm btn-success"]) !!}
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