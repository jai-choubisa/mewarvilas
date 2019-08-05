@extends('layout.main')

@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Edit event
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>events</li>
                <li><a class="link-effect" href="../">Create</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content content-narrow">
    <!-- Register Forms -->
    <h2 class="content-heading">Edit event</h2>
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
                    <h3 class="block-title">events</h3>
                </div>
                <div class="block-content">
                    {!! Form::model($event,["method"=>"PATCH","action" => ['EventsController@update',$event->id],"class"=>"form-horizontal push-5-t",'novalidate' => 'novalidate', "files" => true]) !!}
                        <div class="form-group">
                            {!! Form::label("restaurant_name","Restaurant *",["class"=>"col-xs-12","for"=>"country_id"]) !!}
                            <div class="col-sm-12">
                                {!! Form::select('restaurant_id',  (['0' => '--Select Restaurant--'] + $restaurants),null,["class"=>"form-control","size"=>'1']) !!}
                            </div>
                        </div>                        
                        <div class="form-group">
                           {!! Form::label("name","Event Name *",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("name",null,["class"=>"form-control","placeholder"=>"Enter Event Name.."]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label(null,"Event Image",["class"=>"col-xs-12","for"=>"image"]) !!}
                            <div class="col-xs-12">
                                {!! Form::file('image',["class"=>"form-control input-lg"]) !!}
                                {!! Form::hidden('old_image', $event->image_path) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("description","Event Description",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("description",null,["class"=>"form-control","placeholder"=>"Enter Event Description.."]) !!}
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
                                {!! Form::submit("Add event",["class"=>"btn btn-sm btn-success"]) !!}
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