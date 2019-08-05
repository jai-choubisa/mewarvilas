@extends('layout.front')

@section('content')


<div style="height:100px;background-color:#286bc6"></div>
<div id="position">
            <div class="container">
                        <ul>
                        <li><a href="http://www.mewarvilas.com">Home</a></li>
                        <li>Order Reserve</li>
                        </ul>
            </div>
    </div><!-- End Position -->

    @if(Session::get('restaurant_id'))
    <div class="container margin_60">

    <h2>Your Order Information</h2>
    <hr>
    <div class="row">
    <div class="col-md-8">
    <div class="alert alert-info" role="alert">PLEASE CONFIRM YOUR BOOKING.</div>
    	<table class="table table-striped cart-list add_bottom_30">
            <thead>
            <tr>
                <th>
                    Restaurant
                </th>
                <th>
                    People
                </th>
                <th>
                    Date
                </th>
                <th>
                    Time
                </th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="thumb_cart">
                        <a href="{{ URL::asset('restaurants/'.Session::get('restaurant_id')) }}"><img src="{{ Session::get('restaurant_image') }}" alt=""></a>
                    </div>
                     <span class="item_cart"><a href="{{ URL::asset('restaurants/'.Session::get('restaurant_id')) }}">{{ Session::get('restaurant_name') }} Restaurant</a></span>
                </td>
                <td>
                    <strong>{{ Session::get('people') }}</strong>
                </td>
                <td>
                    <strong><?php  echo date("d M Y", strtotime(Session::get('date'))); ?></strong>
                </td>
                <td>
                    <strong>{{ Session::get('time') }}</strong>
                </td>
              </tr>

            </tbody>
            </table>

    </div><!-- End col-md-8 -->

    <aside class="col-md-4">
    <div class="box_style_1">
        <h3 class="inner">- Summary -</h3>
        <table class="table table_summary">
        <tbody>
            <tr>
                <td>
                    Date
                </td>
                <td class="text-right">
                    <?php  echo date("d M Y", strtotime(Session::get('date'))); ?>
                </td>
            </tr>

            <tr>
                    <td>
                        Restaurant
                    </td>
                    <td class="text-right">
                       {{ Session::get('restaurant_name') }} Restaurant
                    </td>
                </tr>
        <tr>
            <td>
                People
            </td>
            <td class="text-right">
                {{ Session::get('people') }}
            </td>
        </tr>
        <tr>
            <td>
                Cost per person
            </td>
            <td class="text-right">
                {{ Session::get('restaurant_price') }}
            </td>
        </tr>
        <tr class="total">
          <td>
            Total cost
            </td>
          <td class="text-right">
            <?php
                $p = Session::get('people');
                $price = Session::get('restaurant_price');
                $total = $p * $price;
            ?>
            Rs <?php echo $total; ?>
            </td>
        </tr>
        </tbody>
        </table>
        @if(Auth::check())
            {!! Form::open(["url" => "restaurant/bookorder","class"=>"form-horizontal push-5-t"]) !!}
            <button type="submit" class="btn_full" >Confirm Order</button>
            {!! Form::close() !!}
        @else
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn_full" >Confirm Order</button>
        @endif
        
            
        
        <a class="btn_full_outline" href="{{ URL::asset('restaurants/'.Session::get('restaurant_id')) }}"><i class="icon-right"></i> Change Order</a>
    </div>
    
    </aside><!-- End aside -->

</div><!--End row -->
</div><!--End container -->
<div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                 <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                               <h4 class="modal-title" id="myModalLabel">Signin with your MewarVilas account</h4>
                           </div>
                           <div class="modal-body">
                               <div class="row">
                                   <div class="col-md-6 col-xs-6">
                                      <h4>Sign In</h4>
                                       <div class="well">
                                       <form method="POST" action="/login">
                                        {!! csrf_field() !!}
                                               <div class="form-group">
                                                   <input type="text" class="form-control" id="username" name="email" value="{{ old('email') }}" title="Please enter you username" placeholder="Enter your email">
                                                   <span class="help-block"></span>
                                               </div>
                                               <div class="form-group">
                                                   <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Password">
                                                   <span class="help-block"></span>
                                               </div>
                                               <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                               <div class="form-group"><a href="#" class="btn btn-sm">Forgot Password</a></div>
                                               <button type="submit" class="btn btn-success btn-block">Login</button>

                                           </form>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-xs-6">
                                       <h4>New User! Create Account</h4>
                                       <div class="well">
                                        <form method="POST" action="/register">
                                          {!! csrf_field() !!}
                                          <div class="form-group">
                                              <input type="text" class=" form-control" name="name" value="{{ old('name') }}"  placeholder="Name">
                                          </div>
                                          <div class="form-group">
                                              <input type="email" class=" form-control" placeholder="Email" name="email" value="{{ old('email')}}">
                                          </div>
                                          <div class="form-group">
                                              <input type="text" class=" form-control" name="phone" value="{{ old('phone') }}"  placeholder="Contact Number">
                                          </div>
                                          <div class="form-group">
                                              <input type="password" class=" form-control" id="password1" name="password"  placeholder="Password">
                                          </div>
                                          <div class="form-group">
                                              <input type="password" class=" form-control" id="password2" name="password_confirmation" placeholder="Confirm password">
                                          </div>
                                          <div id="pass-info" class="clearfix"></div>
                                          <button class="btn_full" type="submit">Register</button>
                                      </form>
                                      </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                </div>
              </div>

@else
<div class="container">
<h2 style="color:red">No Orders Found</h2>
</div>
@endif


@stop