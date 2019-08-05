@extends('layout.front')

@section('content')
<!-- resources/views/auth/login.blade.php -->
<section id="hero" class="login" style="background:url({{ URL::asset("assets/images/register.jpg") }})">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div id="login">
                        @include ('errors.list')
                        <form method="POST" action="/login">
                        {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class=" form-control " placeholder="Username" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <p class="small">
                                <a href="#">Forgot Password?</a>
                            </p>
                            <button class="btn_full" type="submit">Sign in</button>
                            <a href="{{ URL::asset("/register") }}" class="btn_full_outline">Register</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
@stop