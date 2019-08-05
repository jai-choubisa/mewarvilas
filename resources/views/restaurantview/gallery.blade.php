@extends('layout.restaurantview')

@section('mystyle')
<link rel="stylesheet" href="{{ URL::asset("_assets/js/plugins/magnific-popup/magnific-popup.min.css") }}">
@stop

@section('content')
<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                Edit Restaurant Profile
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
                <li>Restaurant Admin</li>
                <li><a class="link-effect" href="../">Edit Profile</a></li>
            </ol>
        </div>
    </div>
    
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
    <!-- Gallery (.js-gallery-advanced class is initialized in App() -> uiHelperMagnific()) -->
    <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
    <div class="row items-push">
        <div class="col-sm-12">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-popout" type="button">Add Image</button>
        </div>
    </div>
    <div class="row items-push js-gallery-advanced">

        @foreach($restaurant_images as $restaurant_image)
        <div class="col-sm-6 col-md-4 col-lg-3 animated fadeIn">
            <div class="img-container fx-img-rotate-r">
                <img class="img-responsive" src="<?php echo $restaurant_image->image_path; ?>" alt="">
                <div class="img-options">
                    <div class="img-options-content">
                        <h3 class="font-w400 text-white push-5">{{ $restaurant_image->title }}</h3>
                        <h4 class="h6 font-w400 text-white-op push-15">Some Extra Info</h4>
                        <a class="btn btn-sm btn-default img-lightbox" href="<?php echo $restaurant_image->image_path; ?>">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-default my-edit-btn" href="#" data-target="#my_modal" data-toggle="modal" data-id="{{ $restaurant_image->id }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-default my-delete-btn" href="#" data-target="#my_modal" data-toggle="modal" data-id="{{ $restaurant_image->id }}"><i class="fa fa-times"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
    <!-- END Gallery -->
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
                    <h3 class="block-title">Add Restaurant Image</h3>
                </div>
                <div class="block-content">
                    {!! Form::open(["url" => "restaurantview/add-image","class"=>"form-horizontal push-5-t",'novalidate' => 'novalidate', "files" => true]) !!}
                    <div class="form-group">
                        {!! Form::label("title","Title",["class"=>"col-xs-12"]) !!}
                    <div class="col-xs-12">
                        {!! Form::text("title",null,["class"=>"form-control"]) !!}
                    </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("description","Description",["class"=>"col-xs-12"]) !!}
                        <div class="col-xs-12">
                            {!! Form::text("description",null,["class"=>"form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label(null,"Image",["class"=>"col-xs-12","for"=>"image"]) !!}
                        <div class="col-xs-12">
                            {!! Form::file('image',["class"=>"form-control input-lg"]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check"></i> Add Image</button>
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
                    <h3 class="block-title" id="modal_title">Update Restaurant Image</h3>
                </div>
                <div class="block-content">
                    {!! Form::open(["url" => "restaurantview/edit-image","class"=>"form-horizontal push-5-t",'id'=>'iform','novalidate' => 'novalidate', "files" => true]) !!}
                    <div class="form-group">
                        {!! Form::label("title","Title",["class"=>"col-xs-12"]) !!}
                    <div class="col-xs-12">
                        {!! Form::text("title",null,["class"=>"form-control",'id'=>'ititle']) !!}
                    </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label("description","Description",["class"=>"col-xs-12"]) !!}
                        <div class="col-xs-12">
                            {!! Form::text("description",null,["class"=>"form-control",'id'=>'idescription']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label(null,"Image",["class"=>"col-xs-12","for"=>"image"]) !!}
                        <div class="col-xs-12">
                            {!! Form::file('image',["class"=>"form-control input-lg"]) !!}
                            <input type="hidden" name="old_image" id="old_image" value="">
                            <img src="" id="old_image_src" height="100px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check"></i> Update Image</button>
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
                    <h4>Do you want to delete the image?</h4>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open(["url" => "restaurantview/delete-image",'id'=>'del_form']) !!}
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
<script src="{{ URL::asset("_assets/js/plugins/magnific-popup/magnific-popup.min.js") }}"></script>
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

    $.get("edit-image/"+data_id)
            .done(function( data ) {
                var obj=$.parseJSON(JSON.stringify(data));
                console.log(obj);
                $('#ititle').val(obj.title);
                $('#iform').attr('action', 'http://localhost:8000/restaurantview/update-image/'+obj.id);
                $('#idescription').val( obj.description );
                $('#old_image').val(obj.image_path);
                $('#old_image_src').attr('src',obj.image_path);
                
                $('#modal-edit').modal('show');
            });
  });

  $('.my-delete-btn').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
    }

    console.log(data_id);
    $('#del_form').attr('action',"delete-image/"+data_id);    
    $('#modal-delete').modal('show');
    
  });
});
</script>
@stop

