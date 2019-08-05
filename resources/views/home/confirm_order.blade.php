@extends('layout.front')

@section('content')

    <div style="height:100px;background-color:#286bc6"></div>
<div id="position">
            <div class="container">
                        <ul>
                        <li><a href="http://www.mewarvilas.com">Home</a></li>
                        <li>Order Status</li>
                        </ul>
            </div>
    </div><!-- End Position -->
    
    <div class="container margin_60">

	<div class="row">
		<div class="col-md-8">
        
			<div class="form_title">
				<h3><strong><i class="icon-ok"></i></strong>Hi {{ Auth::user()->name }}</h3>
			</div>
			<div class="step">
				<p>
					Thank you for booking with us. We’ve recieved your booking request. You'll recieve a SMS and Email soon.
				</p>
			</div><!--End step -->
            
			<div class="form_title">
				<h3><strong><i class="icon-tag-1"></i></strong>Booking summary</h3>
				<p>
					Details of your order.
				</p>
			</div>
			<div class="step">
				<table class="table confirm">
				<tbody>
				<tr>
                    <td><strong>Booking Id</strong></td>
                    <td style="font-weight:bold;font-size:1.4em;color:red;">{{ $order->booking_no }}</td>
                </tr>
				<tr>
					<td>
						<strong>Restaurant Name</strong>
					</td>
					<td>
					  {{ $restaurant->restaurant_name }}
					</td>
				</tr>
				<tr>
					<td>
						<strong>Address</strong>
					</td>
					<td>{{ $restaurant->address }}</td>
				</tr>

                 <tr>
					<td><strong>People</strong></td>
					<td>{{ $order->people }}</td>
				</tr>
                <tr>
					<td><strong>Date</strong></td>
					<td><?php  echo date("d M Y", strtotime($order->date)); ?></td>
				</tr>
                <tr>
					<td><strong>Time</strong></td>
					<td>{{ $order->time }}</td>
				</tr>


				</tbody>
				</table>
			</div><!--End step -->
		</div><!--End col-md-8 -->
        
		<aside class="col-md-4">
		{{--<div class="box_style_1">--}}
			{{--<h3 class="inner">Thank you!</h3>--}}
			{{--<p>--}}
				{{--Nihil inimicus ex nam, in ipsum dignissim duo. Tale principes interpretaris vim ei, has posidonium definitiones ut. Duis harum fuisset ut his, duo an dolor epicuri appareat.--}}
			{{--</p>--}}
			{{--<hr>--}}
			{{--<a class="btn_full_outline" href="invoice.html" target="_blank">View your invoice</a>--}}
		{{--</div>--}}
		<div class="box_style_4">
			<i class="icon_set_1_icon-89"></i>
			<h4>Have <span>questions?</span></h4>
			<a href="tel://9460718986" class="phone">+9460718986</a>
			<small>Monday to Saturday 10.00am - 8.00pm</small>
		</div>
		</aside>
        
	</div><!--End row -->
</div><!--End container -->
@stop