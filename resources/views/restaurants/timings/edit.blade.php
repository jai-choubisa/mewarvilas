@extends('layout.main')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Edit Restaurant Timings
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Timings</li>
                <li><a class="link-effect" href="../">Create</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Register Forms -->
    <h2 class="content-heading">Edit timings</h2>
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
                    <h3 class="block-title">Timings</h3>
                </div>
                <div class="block-content">
                    {!! Form::model($timing,["method"=>"PATCH","action" => ['TimingsController@update',$timing->id],"class"=>"form-horizontal push-5-t"]) !!}
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
                            {!! Form::label("starttime","Start Time *",["class"=>"col-xs-12","for"=>"start_time"]) !!}
                            <div class="col-sm-12">                                
                                <?php 
                                    $mytime = array();
                                    $mytime[0] = "--Select Opening Time--";
                                    for($i=1;$i<=24;$i++){ 
                                        $a=$i;
                                       
                                         if($i==24)
                                        {
                                            $mytime['00:00 AM']='00:00 AM';
                                            $mytime['00:30 AM']='00:30 AM';
                                        }
                                        else if($i>12){
                                            $a = $i-12;
                                            $b1=$a.':'.'00 PM';
                                            $mytime[$b1] = $b1;
                                            $c1=$a.':'.'30 PM';
                                            $mytime[$c1] = $c1;

                                        }
                                        else{
                                             $b1=$a.':'.'00 AM';
                                        $mytime[$b1] = $b1;
                                        $c1=$a.':'.'30 AM';
                                        $mytime[$c1] = $c1;
                                        }
                                    }
                                ?>
                                {!! Form::select('start_time', $mytime,null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label("endtime","End Time *",["class"=>"col-xs-12","for"=>"end_time"]) !!}
                            <div class="col-sm-12">                                
                                {!! Form::select('end_time', $mytime,null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <!-- <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i> Add</button> -->
                                {!! Form::submit("Update timings",["class"=>"btn btn-sm btn-success"]) !!}
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