@extends('layout.restaurantview')

@section('content')

<!-- Page Header -->
<!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('{{ URL::asset("_assets/img/photos/photo3@2x.jpg") }}');">
    <div class="push-50-t push-15">
        <h1 class="h2 text-white animated zoomIn">Dashboard</h1>
        <h2 class="h5 text-white-op animated zoomIn">Welcome Restaurant Administrator</h2>
    </div>
</div>
<!-- END Page Header -->

<!-- Stats -->
<div class="content bg-white border-b">
    <div class="row items-push text-uppercase">
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Booking Orders</div>
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
            <a class="h2 font-w300 text-primary animated flipInX" href="{{ URL::asset("restaurantview/daily-orders") }}">{{ $order['today'] }}</a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Booking Orders</div>
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Week</small></div>
            <a class="h2 font-w300 text-primary animated flipInX" href="{{ URL::asset("restaurantview/orders") }}">{{ $order['thisweek'] }}</a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Booking Orders</div>
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
            <a class="h2 font-w300 text-primary animated flipInX" href="{{ URL::asset("restaurantview/orders") }}">{{ $order['thismonth'] }}</a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Booking Orders</div>
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
            <a class="h2 font-w300 text-primary animated flipInX" href="{{ URL::asset("restaurantview/orders") }}">{{ $order['all'] }}</a>
        </div>
    </div>
</div>
<!-- END Stats -->


@stop