@extends('layout.front')

@section('content')

<div style="height:100px;background-color:#286bc6"></div>
<div id="position">
            <div class="container">
                        <ul>
                        <li><a href="http://www.mewarvilas.com">Home</a></li>
                        <li>User Profile</li>
                        </ul>
            </div>
    </div><!-- End Position -->
<div class="container" style="padding-bottom:2em;">
    <h2>Edit Profile</h2>
    <hr>
  <div class="row">
      <!-- left column -->
      <?php //var_dump(Auth::user()); ?>

      <!-- edit form column -->
      <div class="col-md-12 personal-info">
            {!! Form::open(["url" => "user/update","class"=>"form-horizontal"]) !!}
          <div class="form-group">
            <label class="col-lg-2 control-label">Name:</label>
            <div class="col-lg-3">
              <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Phone:</label>
            <div class="col-md-3">
              <input class="form-control" type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-4">
              <input type="submit" class="btn btn-primary" value="Update Profile">
              <span></span>
              <a href="{{ URL::asset("/user/profile") }}" class="btn btn-default" >Cancel</a>
            </div>
          </div>
       {!! Form::close() !!}
      </div>
  </div>
</div>


    @stop