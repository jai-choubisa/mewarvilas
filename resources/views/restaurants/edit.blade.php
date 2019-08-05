@extends('layout.main')

@section('content')
<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Edit New Restaurant <small>Add restaurant to the website.</small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Restaurants</li>
                <li><a class="link-effect" href="../">Edit</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Mega Form -->
    <h2 class="content-heading">Edit New Restaurant</h2>
    <div class="block block-bordered">
        <div class="block-header bg-gray-lighter">
            <ul class="block-options">
                <li>
                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                </li>
            </ul>
            <h3 class="block-title">Please Fill the form below to update a new Restaurant.</h3>
        </div>
        <div class="block-content">
        {!! Form::model($restaurant,["method"=>"PATCH","action" => ['RestaurantsController@update',$restaurant->id],"class"=>"form-horizontal push-10-t push-10",'novalidate' => 'novalidate', "files" => true]) !!}
            <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="col-xs-6">
                                {!! Form::label(null,"Restaurant Name *",["for"=>"restaurant_name"]) !!}
                                {!! Form::text("restaurant_name",null,["class"=>"form-control input-lg","placeholder"=>"Enter Restaurant name.."]) !!}
                                {!! Form::hidden("user_id",$restaurant->user_id) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="col-xs-6">
                                {!! Form::label(null,"Phone *",["for"=>"phone"]) !!}
                                {!! Form::text("phone",null,["class"=>"form-control input-lg","placeholder"=>"Enter your phone.."]) !!}
                            </div>
                            <div class="col-xs-6">
                                {!! Form::label(null,"Price *",["for"=>"price"]) !!}
                                {!! Form::text("price",null,["class"=>"form-control input-lg","placeholder"=>"Enter price for 2 people.."]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            {!! Form::label(null,"Banner Image",["class"=>"col-xs-12","for"=>"banner_image_path"]) !!}
                            <div class="col-xs-12">
                                {!! Form::file('banner_image',["class"=>"form-control input-lg"]) !!}
                                {!! Form::hidden('old_banner_image', $restaurant->banner_image_path) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="col-xs-12">
                                {!! Form::label(null,"About",["for"=>"about"]) !!}
                                {!! Form::textarea('about', null, ['class' => 'form-control input-lg','rows'=>'32','placeholder'=>'Enter about the restaurant..']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        
                        
                        <div class="form-group">
                            <div class="col-xs-12">
                                {!! Form::label(null,"Address",["for"=>"address"]) !!}
                                {!! Form::text("address",null,["class"=>"form-control input-lg","placeholder"=>"Enter your address.."]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label(null,"Country",["class"=>"col-xs-12","for"=>"country_id"]) !!}
                            <div class="col-sm-12">
                                
                                {!! Form::select('country_id',  (['0' => '--Select Country--'] + $countries),null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label(null,"State",["class"=>"col-xs-12","for"=>"state_id"]) !!}
                            <div class="col-sm-12">
                                
                                {!! Form::select('state_id',  (['0' => '--Select State--'] + $states),null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label(null,"City",["class"=>"col-xs-12","for"=>"city_id"]) !!}
                            <div class="col-sm-12">
                                
                                {!! Form::select('city_id',  (['0' => '--Select City--'] + $cities),null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        {!! Form::submit("Update Restaurant",["class"=>"btn btn-warning"]) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- END Mega Form -->
</div>
<!-- END Page Content -->

@include ('errors.list')

@stop