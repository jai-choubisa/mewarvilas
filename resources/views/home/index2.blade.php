@extends('layout.front')

@section('content')
<section id="search_container">

 	<div id="search">

        {!! Form::open(["url" => "restaurants/find"]) !!}
        <h2 style="color:#fff;text-shadow: -3px -1px 3px rgba(0,0,0,0.5),1px 1px 1px #000,2px 4px 2px rgba(0,0,0,0.4),0 0 7px rgba(0,0,0,0.4);">Restaurant Reservations in Udaipur</h2>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" class="form-control" id="restaurant_word" name="search_word" placeholder="Search by Restaurant name or Cuisine name..">
                        <!-- <div id="suggesstion-box"></div> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn_1 green" type="submit" name="search restaurant" style="padding:0.82em 1.2em;"><i class="icon-search"></i>Search now</button>
                </div>
            </div><!-- End row -->
            
        {!! Form::close() !!}

	</div>
</section><!-- End hero -->

    <div class="container margin_60">

        <div class="banner" style="color:#1cbbb4;margin-bottom: 1.5em;font-size: 1.1em;text-align: center;padding:0.5em;"><span style="background-color:#1cbbb4;color:white;font-size:1.3em;padding:0.2em;">1</span> Reservation <span class="icon-right-thin"></span> <span style="background-color:#1cbbb4;color:white;font-size:1.3em;padding:0.2em;">2</span> Attendance <span class="icon-right-thin"></span> <span style="background-color:#1cbbb4;color:white;font-size:1.3em;padding:0.2em;">3</span> Earn Points <span class="icon-right-thin"></span> <span style="background-color:#1cbbb4;color:white;font-size:1.3em;padding:0.2em;">4</span> Redeem Gifts</div>

        <div class="row">
            <div class="col-md-3 col-sm-6 text-center">
                <p>
                    <a href="{{ URL::asset("restaurants") }}"><img src="{{ URL::asset("assets/images/lake-view2.jpg") }}" alt="Lake View Restaurants" title="Lake View Restaurants" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <p>
                    <a href="{{ URL::asset("restaurants") }}"><img src="{{ URL::asset("assets/images/rooftop2.jpg") }}" alt="Roof Top Restaurants" title="Roof Top Restaurants" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <p>
                    <a href="{{ URL::asset("restaurants") }}"><img src="{{ URL::asset("assets/images/romantic2.jpg") }}" alt="Romantic Restaurants" title="Romantic Restaurants" class="img-responsive"></a>
                </p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <p>
                    <a href="{{ URL::asset("restaurants") }}"><img src="{{ URL::asset("assets/images/royal2.jpg") }}" alt="Royal Restaurants" title="Royal Restaurants" class="img-responsive"></a>
                </p>
            </div>
        </div><!-- End row -->
        <hr>

        <div class="main_title">
                    <h2>Udaipur <span>Top</span> Restaurants</h2>
                </div>
                <?php $i=1; ?>
                <div class="row">
                    @foreach($restaurants as $restaurant)
                    <div class="col-md-3 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="tour_container">
                            <div class="img_container">
                                <a href="{{ URL::asset('restaurants/'.$restaurant->id) }}">
                                <img src="{{ URL::asset($restaurant->banner_image_path) }}" class="img-responsive" alt="">
                                <div class="ribbon top_rated"></div>
                                <div class="short_info">
                                    <i class="icon_set_1_icon-44"></i>Historic Buildings<span class="price"><sup>Rs</sup>{{ $restaurant->price}}</span>
                                </div>
                                </a>
                            </div>
                            <div class="tour_title">
                                <h3><strong>{{ $restaurant->restaurant_name }}</strong></h3>
                                <div class="rating">
                                    <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
                                </div><!-- end rating -->
                                <div class="wishlist">
                                    <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                </div><!-- End wish list-->
                            </div>
                        </div><!-- End box tour -->
                    </div><!-- End col-md-4 -->
                @if($i%4==0)
                </div>
                <div class="row">
                @endif
                <?php $i++; ?>
                @endforeach
                </div><!-- End row -->
                <p class="text-center add_bottom_30">
                    <a href="{{ URL::asset('restaurants') }}" class="btn_1 medium"><i class="icon-eye-7"></i>View all Restaurants </a>
                </p>

            <hr>

        <div class="row add_bottom_45">
            <div class="col-md-4 other_tours">
                <h3>Popular Cuisines</h3>
                <ul>
                    @foreach($cuisines as $cuisine)
                    <li><a href="#"><i class="icon-food-1"></i>{{ $cuisine->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 other_tours">
                <h3>Newly Added Restaurants</h3>
                <ul>
                    @foreach($newrestaurants as $restaurant)
                    <li><a href="{{ URL::asset('restaurants/'.$restaurant->id) }}"><i class="icon-restaurant"></i>{{ $restaurant->restaurant_name }}<span class="other_tours_price">Rs {{ $restaurant->price}}</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 other_tours" style="padding-top: 2em;">
                <div class="box_style_4">
                    <i class="icon_set_1_icon-90"></i>
                    <h4><span>Book</span> by phone</h4>
                        <a href="tel://09460718986" class="phone">+91 9460718986</a>
                    <small>Monday to Friday 9.00am - 7.30pm</small>
                </div>
            </div>

        </div><!-- End row -->

        <hr>

        <div class="main_title">
        			<h2>What <span>customers </span>says</h2>

        	</div>

        	<div class="row">
        		<div class="col-md-6">
        			<div class="review_strip">
        				<img src="{{ URL::asset('assets/img/avatar2.jpg') }}" alt="" class="img-circle">
        				<h4>Jhon Doe</h4>
        				<p>
        					 "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
        				</p>
        				<div class="rating">
        					<i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i class=" icon-star-empty"></i>
        				</div>
        			</div><!-- End review strip -->
        		</div>

        		<div class="col-md-6">
        			<div class="review_strip">
        				<img src="{{ URL::asset('assets/img/avatar3.jpg') }}" alt="" class="img-circle">
        				<h4>Mark Schulz</h4>
        				<p>
        					 "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
        				</p>
        				<div class="rating">
        					<i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i class=" icon-star-empty"></i>
        				</div>
        			</div><!-- End review strip -->
        		</div>
        	</div><!-- End row -->

        	<div class="row">
        		<div class="col-md-6">
        			<div class="review_strip">
        				<img src="{{ URL::asset('assets/img/avatar2.jpg') }}" alt="" class="img-circle">
        				<h4>Tony Costello</h4>
        				<p>
        					 "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
        				</p>
        				<div class="rating">
        					<i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i class=" icon-star-empty"></i>
        				</div>
        			</div><!-- End review strip -->
        		</div>

        		<div class="col-md-6">
        			<div class="review_strip">
        				<img src="{{ URL::asset('assets/img/avatar3.jpg') }}" alt="" class="img-circle">
        				<h4>Peter Gabriel</h4>
        				<p>
        					 "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
        				</p>
        				<div class="rating">
        					<i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i><i class=" icon-star-empty"></i>
        				</div>
        			</div><!-- End review strip -->
        		</div>
        	</div><!-- End row -->

    </div><!-- End container -->
@stop
@section('myscript')
<script type="text/javascript">

$("#restaurant_word").autocomplete({
    source: function( request, response )
    {
    $.ajax({
    url: "{{ URL::asset('restaurants/search') }}",
    type: "post",
        dataType: "json",
        data: {
        search_word: request.term,
        _token: $('input[name=_token]').val()
        },
        success: function( data )
        {
        response(
        $.map(data, function(item) {
        return {
        value: item.restaurant_name,
        selectedId: item.id
        }
        })
        );
        }
        });
        },
        minLength: 1,
        select: function(event, ui )
        {
        if(ui.item) {
        $(event.target).val(ui.item.label);

        }
        return false;
        },
        open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
        },
        close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
        }
        }).autocomplete( "instance" )._renderItem = function (ul, item) {
                                        var inner_html = '<a href="{{ URL::asset('restaurants/')}}/'+ item.selectedId +'">' + item.label + '</a>';
                                        return $("<li></li>")
                                                .data("item.autocomplete", item)
                                                .append(inner_html)
                                                .appendTo(ul);
                                    };


</script>

@stop

