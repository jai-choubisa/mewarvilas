@extends('layout.restaurantview')

@section('content')
<div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                               Events <small>full list.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>Events</li>
                                <li><a class="link-effect" href="{{ URL::asset('restaurants.events.index') }}">Index</a></li>
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
                            <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal-popout" type="button">Add Event</button>
                            <h3 class="block-title pull-left">Events Information <small>Full</small></h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                           <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Event Image</th>
                                        <th>Event Name</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td class="font-w600"><img src="{{ URL::asset($event->image_path) }}" alt="" height="100px" /></td>
                                        <td class="font-w600">{{ $event->name }}</td>
                                        <td class="text-center"><?php  echo date("d M Y", strtotime($event->from_date)); ?></td>
                                        <td class="text-center"><?php  echo date("d M Y", strtotime($event->to_date)); ?></td>
                                        <td class="text-center">{{ $event->start_time }}</td>
                                        <td class="text-center">{{ $event->end_time }}</td>

                                        <td class="text-center">
                                            
                                                
                                                <div class="form-group">
                                                    <a href="#" data-target="#my_modal" data-toggle="modal" data-id="{{ $event->id }}" class="btn btn-xs btn-default my-edit-btn" data-toggle="tooltip" title="Edit Event"><i class="fa fa-pencil"></i></a>
                                                    <button class='btn btn-xs btn-default my-delete-btn' data-target="#my_modal" data-toggle="modal" data-id="{{ $event->id }}" title="Delete Event"><i class="fa fa-times"></i></button>
                                                </div>
                                                
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
<!-- Pop Out Modal -->
<div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Create New Event</h3>
                </div>
                <div class="block-content">
                    {!! Form::open(["url" => "restaurantview/add-event","class"=>"form-horizontal push-5-t",'novalidate' => 'novalidate', "files" => true]) !!}
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
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check"></i> Add Event</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- END Pop Out Modal -->

<!-- Pop Out Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title" id="modal_title">Edit Event</h3>
                </div>
                <div class="block-content">
                    {!! Form::open(["url" => "restaurantview/edit-event","class"=>"form-horizontal push-5-t",'id'=>'iform','novalidate' => 'novalidate', "files" => true]) !!}
                    <div class="form-group">
                           {!! Form::label("name","Event Name *",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("name",null,["class"=>"form-control","placeholder"=>"Enter Event Name..",'id'=>'event_name']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label(null,"Event Image",["class"=>"col-xs-12","for"=>"image"]) !!}
                            <div class="col-xs-12">
                                {!! Form::file('image',["class"=>"form-control input-lg"]) !!}
                                {!! Form::hidden('old_image', $event->image_path,['id'=>'event_image_old']) !!}
                                <img src="" id="src_old" height="100px" />
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("description","Event Description",["class"=>"col-xs-12"]) !!}
                            <div class="col-xs-12">
                                {!! Form::text("description",null,["class"=>"form-control","placeholder"=>"Enter Event Description..",'id'=>'event_description']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label("date","Valid Period",["class"=>"col-md-4 control-label"]) !!}
                            <div class="col-md-8">
                                <div class="input-daterange input-group" id="datepicker" data-date-format="mm/dd/yyyy">
                                    {!! Form::text("from_date",null,["class"=>"form-control first-date","placeholder"=>"From date","id"=>"example-daterange3"]) !!}
                                    <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                    {!! Form::text("to_date",null,["class"=>"form-control last-date","placeholder"=>"Till date","id"=>"example-daterange4"]) !!}
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
                                {!! Form::select('start_time', $mytime,null,["class"=>"form-control","size"=>'1','id'=>'start_time']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label("endtime","End Time *",["class"=>"col-xs-12","for"=>"end_time"]) !!}
                            <div class="col-sm-12">                                
                                {!! Form::select('end_time', $mytime,null,["class"=>"form-control","size"=>'1','id'=>'end_time']) !!}
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check"></i> Update Event</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- END Pop Out Modal -->


<!-- Small Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideleft">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Confirm Delete</h3>
                </div>
                <div class="block-content">
                    <h4>Do you want to delete the event?</h4>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open(["url" => "restaurantview/delete-event",'id'=>'del_form']) !!}
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-close"></i> Delete</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- END Small Modal -->
@stop

@include ('errors.list')

@section('myscript')
<script type="text/javascript">

    function deletedata(val){
        var data = table.row($(val).parents('tr')).data();

        $('.debug-url').html('Delete Category : '+data[0]+' ?');

        $('#delete_btn').attr('data-href', data[1]);
        $('#modal-delete').modal('show');
    }
$(document).ready(function() {

  $('.my-edit-btn').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
    }

    console.log(data_id);

    $.get("edit-event/"+data_id)
            .done(function( data ) {
                var obj=$.parseJSON(JSON.stringify(data));
                console.log(obj);
                var eventObj = obj.eventvar;
                $('#event_name').val(eventObj.name);
                $('#event_image_old').val(eventObj.image_path);
                $('#event_description').val(eventObj.description);
                $('#example-daterange3').val(obj.fromdate);
                $('#example-daterange4').val(obj.todate);
                $('#start_time').val(eventObj.start_time);
                $('#end_time').val(eventObj.end_time);
                $('#iform').attr('action', 'http://localhost:8000/restaurantview/update-event/'+eventObj.id);
                
                $('#src_old').attr('src',eventObj.image_path);
                
                $('#modal-edit').modal('show');
            });
  });

  $('.my-delete-btn').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
    }

    console.log(data_id);
    $('#del_form').attr('action',"delete-event/"+data_id);    
    $('#modal-delete').modal('show');
    
  });
});
</script>
@stop

