@extends('layout.front')

@section('content')
<section id="search_container">
 	<div id="search">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#restaurants" data-toggle="tab">Restaurants</a></li>
                        <li><a href="#hotels" data-toggle="tab">Hotels</a></li>
                        <li><a href="#resorts" data-toggle="tab">Resorts</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="restaurants">
                        <h3>Search Restaurants in Udaipur</h3>
                        	<div class="row">
                            	<div class="col-md-10">
                                	<div class="form-group">
                                        <label>Search Restaurant</label>
                                        <input type="text" class="form-control" id="firstname_booking" name="firstname_booking" placeholder="Area or Restaurant Name">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Things to do</label>
                                        <select class="ddslick" name="category">
                                            <option value="0" data-imagesrc="{{ URL::asset("assets/img/icons_search/all_tours.png") }}" selected>All tours</option>
                                            <option value="1" data-imagesrc="{{ URL::asset("assets/img/icons_search/sightseeing.png") }}">City sightseeing</option>
                                            <option value="2"  data-imagesrc="{{ URL::asset("assets/img/icons_search/museums.png") }}">Museum tours</option>
                                            <option value="3" data-imagesrc="{{ URL::asset("assets/img/icons_search/historic.png") }}">Historic Buildings</option>
                                            <option value="4" data-imagesrc="{{ URL::asset("assets/img/icons_search/walking.png") }}">Walking tours</option>
                                            <option value="5" data-imagesrc="{{ URL::asset("assets/img/icons_search/eat.png") }}">Eat & Drink</option>
                                            <option value="6" data-imagesrc="{{ URL::asset("assets/img/icons_search/churches.png") }}">Churces</option>
                                            <option value="7" data-imagesrc="{{ URL::asset("assets/img/icons_search/skyline.png") }}">Skyline tours</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div><!-- End row -->
                            <div class="row">
                            	<div class="col-md-4">
                                	<div class="form-group">
                                        <label><i class="icon-calendar-7"></i> Date</label>
                        				<input class="date-pick form-control" data-date-format="M d, D" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                	<div class="form-group">
                                        <label><i class=" icon-clock"></i> Time</label>
                        				<input class="time-pick form-control" value="12:00 AM" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <label>People</label>
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="adults" class="qty2 form-control" name="adults">
                                        </div>
                                    </div>
                                </div>
                                
                            </div><!-- End row -->
                            <hr>
                            <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
                        </div><!-- End rab -->
                        <div class="tab-pane" id="hotels">
                        <h3>Search Hotels in Udaipur</h3>
                        	<div class="row">
                            	<div class="col-md-3">
                                	<div class="form-group">
                                        <label><i class="icon-calendar-7"></i> Check in</label>
                        				<input class="date-pick form-control" data-date-format="M d, D" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                        <label><i class="icon-calendar-7"></i> Check out</label>
                        				<input class="date-pick form-control" data-date-format="M d, D" type="text">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-5">
                                    <div class="form-group">
                                        <label>Adults</label>
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="adults" class="qty2 form-control" name="adults_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-5">
                                    <div class="form-group">
                                        <label>Children</label>
                                        <div class="numbers-row">
                                            <input type="text" value="0" id="children" class="qty2 form-control" name="children_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                	<div class="form-group">
                                        <label>Rooms</label>
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="children" class="qty2 form-control" name="rooms">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End row -->
                            <div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group">
                                        <label>Hotel name</label>
                                        <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="Optionally type hotel name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    <label>Preferred city area</label>
                                        <select class="form-control" name="area">
                                            <option value="Centre" selected>Centre</option>
                                            <option value="Gar du Nord Station">Gar du Nord Station</option>
                                            <option value="La Defance">La Defance</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- End row -->
                            <hr>
                            <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
                        </div>
                        <div class="tab-pane" id="resorts">
                        <h3>Search Resorts in Udaipur</h3>
                        	<div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group">
                                	<label class="select-label">Pick up location</label>
                                        <select class="form-control">
                                            <option value="orly_airport">Orly airport</option>
                                            <option value="gar_du_nord">Gar du Nord Station</option>
                                            <option value="hotel_rivoli">Hotel Rivoli</option>
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                	<label class="select-label">Drop off location</label>
                                        <select class="form-control">
                                            <option value="orly_airport">Orly airport</option>
                                            <option value="gar_du_nord">Gar du Nord Station</option>
                                            <option value="hotel_rivoli">Hotel Rivoli</option>
                                        </select>
                                        </div>
                                </div>
                            </div><!-- End row -->
                            <div class="row">
                            	<div class="col-md-3">
                                	<div class="form-group">
                                        <label><i class="icon-calendar-7"></i> Date</label>
                        				<input class="date-pick form-control" data-date-format="M d, D" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                        <label><i class=" icon-clock"></i> Time</label>
                        				<input class="time-pick form-control" value="12:00 AM" type="text">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <div class="form-group">
                                        <label>Adults</label>
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-9">
                                    <div class="form-group">
                                    	<div class="radio_fix">
                                        <label class="radio-inline" style="padding-left:0">
                                          <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> One Way
                                        </label>
                                        </div>
                                        <div class="radio_fix">
                                        <label class="radio-inline">
                                          <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Return
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End row -->
                            <hr>
                            <button class="btn_1 green"><i class="icon-search"></i>Search now</button>
                        </div>
                    </div>
	</div>
</section><!-- End hero -->
    
    <div class="container margin_60">
    
        <div class="main_title">
            <h2>Some <span>good</span> reasons</h2>
            <p>
                Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
            </p>
        </div>
        
        <div class="row">
        
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-41"></i>
                    <h3><span>+120</span> Premium tours</h3>
                    <p>
                         Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                    </p>
                    <a href="about.html" class="btn_1 outline">Read more</a>
                </div>
            </div>
            
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-30"></i>
                    <h3><span>+1000</span> Customers</h3>
                    <p>
                         Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                    </p>
                    <a href="about.html" class="btn_1 outline">Read more</a>
                </div>
            </div>
            
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-57"></i>
                    <h3><span>H24 </span> Support</h3>
                    <p>
                         Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                    </p>
                    <a href="about.html" class="btn_1 outline">Read more</a>
                </div>
            </div>
            
        </div><!--End row -->
        
        <hr>
        
        <div class="row">
            <div class="col-md-8 col-sm-6 hidden-xs">
                <img src="{{ URL::asset("assets/img/laptop.png") }}" alt="Laptop" class="img-responsive laptop">
            </div>
            <div class="col-md-4 col-sm-6">
                <h3><span>Get started</span> with CityTours</h3>
                <p>
                    Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset.
                </p>
                <ul class="list_order">
                    <li><span>1</span>Select your preferred tours</li>
                    <li><span>2</span>Purchase tickets and options</li>
                    <li><span>3</span>Pick them directly from your office</li>
                </ul>
                <a href="all_tour_list.html" class="btn_1">Start now</a>
            </div>
        </div><!-- End row -->
        
    </div><!-- End container -->
 
    
    <div class="white_bg">
        <div class="container margin_60">
            <div class="main_title">
                <h2>Other <span>Popular</span> tours</h2>
                <p>
                    Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                </p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 text-center">
                    <p>
                        <a href="#"><img src="{{ URL::asset("assets/img/bus.jpg") }}" alt="Pic" class="img-responsive"></a>
                    </p>
                    <h4><span>Sightseen tour</span> booking</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                    </p>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <p>
                        <a href="#"><img src="{{ URL::asset("assets/img/transfer.jpg") }}" alt="Pic" class="img-responsive"></a>
                    </p>
                    <h4><span>Transfer</span> booking</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                    </p>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <p>
                        <a href="#"><img src="{{ URL::asset("assets/img/guide.jpg") }}" alt="Pic" class="img-responsive"></a>
                    </p>
                    <h4><span>Tour guide</span> booking</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                    </p>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <p>
                        <a href="#"><img src="{{ URL::asset("assets/img/hotel.jpg") }}" alt="Pic" class="img-responsive"></a>
                    </p>
                    <h4><span>Hotel</span> booking</h4>
                    <p>
                        Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                    </p>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </div><!-- End white_bg -->


@stop