@extends('layout.main')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Edit Menu
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Menus</li>
                <li><a class="link-effect" href="../">Create</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Register Forms -->
    <h2 class="content-heading">Edit Menu</h2>
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
                    <h3 class="block-title">Menus</h3>
                </div>
                <div class="block-content">
                    <?php //print_r($menu);exit; ?>
                    {!! Form::model($menu,["method"=>"PATCH","action" => ['MenusController@update',$menu->id],"class"=>"form-horizontal push-5-t",'novalidate' => 'novalidate', "files" => true]) !!}
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
                            {!! Form::label(null,"Image",["class"=>"col-xs-12","for"=>"image"]) !!}
                            <div class="col-xs-12">
                                {!! Form::file('image',["class"=>"form-control input-lg"]) !!}
                                {!! Form::hidden('old_image', $menu->image_path) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <!-- <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i> Add</button> -->
                                {!! Form::submit("Update menu",["class"=>"btn btn-sm btn-success"]) !!}
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