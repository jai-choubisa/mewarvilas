@extends('layout.front')

@section('content')
<section id="hero" class="login" style="background:url({{ URL::asset("assets/images/register.jpg") }})">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div id="login">
                        <div class="text-center"><h2>Sign Up Form</h2></h2></div>
                        <hr>
                        @include ('errors.list')
                       <form method="POST" action="/register">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class=" form-control" name="name" value="{{ old('name') }}"  placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class=" form-control" placeholder="Email" name="email" value="{{ old('email')}}">
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class=" form-control" name="phone" value="{{ old('phone') }}"  placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class=" form-control" id="password1" name="password"  placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" class=" form-control" id="password2" name="password_confirmation" placeholder="Confirm password">
                            </div>
                            <div id="pass-info" class="clearfix"></div>
                            <button class="btn_full" type="submit">Register</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@stop