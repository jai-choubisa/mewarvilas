@extends('layout.front')

@section('content')
<?php //var_dump($restaurants);exit; ?>
<section class="parallax-window" data-parallax="scroll" data-image-src="{{ URL::asset("assets/img/restaurants_banner.jpg") }}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1>Udaipur Restaurants</h1>
        <p>Find the most delicious restaurants in udaipur.</p>
        </div>
    </div>
             <div id="search_bar_container">
             {!! Form::open(["url" => "restaurants/find"]) !!}
                    <div class="container">
                            <div class="search_bar">
                            <span class="nav-facade-active" id="nav-search-in">
                            <span id="nav-search-in-content" style="">Restaurants</span>
                            <!-- <span class="nav-down-arrow nav-sprite"></span>
                            <select title="Search in" class="searchSelect" id="searchDropdownBox" name="tours_category">
                                <option value="All Tours"  title="All Tours">All Tours</option>
                                <option value="Museums" title="Museums">Museums</option>
                                <option value="Tickets" title="Tickets">Tickets</option>
                                <option value="Hotels" title="Hotels">Hotels</option>
                                <option value="Restaurants" title="Restaurants">Restaurants</option>
                            </select> -->
                            </span>
                            <div class="nav-searchfield-outer">
                                <input type="text" name="search_word" placeholder="Search by Restaurant name or Cuisine name.." id="twotabsearchtextbox">
                            </div>
                            <div class="nav-submit-button">
                                <input type="submit" title="Cerca" class="nav-submit-input" value="Search">
                            </div>
                        </div><!-- End search bar-->
                    </div>
                    {!! Form::close() !!}
                </div><!-- /search_bar-->
</section><!-- End section -->

<div id="position">
        <div class="container">
                    <ul>
                    <li><a href="{{ URL::asset('') }}">Home</a></li>
                    <li>Restaurants</li>
                    </ul>
        </div>
    </div><!-- Position -->
    
<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div><!-- End Map -->

<div  class="container margin_60">
            
        <div class="row">
        <aside class="col-lg-3 col-md-3">
            <p>
                <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
            </p>
   
        <div id="filters_col">
            <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
            <div class="collapse" id="collapseFilters">
                <div class="filter_type">
                    <h6>Price</h6>
                    <ul>
                        <li><label><input type="checkbox" checked>From Rs 50 to Rs 100</label></li>
                        <li><label><input type="checkbox">From Rs 100 to Rs 200</label></li>
                        <li><label><input type="checkbox">From Rs 200 to Rs 500</label></li>
                        <li><label><input type="checkbox">From Rs 500 to Rs 1000</label></li>
                        <li><label><input type="checkbox">Above Rs 1000</label></li>
                    </ul>
                </div>
                    <div class="filter_type">
                    <h6>Star Category</h6>
                    <ul>
                        <li><label><input type="checkbox"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i>
                        </span>(15)</label></li>
                        <li><label><input type="checkbox"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i>
                        </span>(45)</label></li>
                        <li><label><input type="checkbox"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                        </span>(35)</label></li>
                        <li><label><input type="checkbox"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                        </span>(25)</label></li>
                        <li><label><input type="checkbox"><span class="rating">
                        <i class="icon_set_1_icon-81 voted"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i><i class="icon_set_1_icon-81"></i>
                        </span>(15)</label></li>
                    </ul>
                </div>
                <div class="filter_type">
                    <h6>Cuisines</h6>
                    <ul>
                        <li><label><input type="checkbox">Chinese</label></li>
                        <li><label><input type="checkbox">Continental</label></li>
                        <li><label><input type="checkbox">Mediterranean</label></li>
                        <li><label><input type="checkbox">Punjabi</label></li>
                        <li><label><input type="checkbox">Rajasthani</label></li>
                    </ul>
                </div>
            </div><!--End collapse -->
        </div><!--End filters col-->
        <div class="box_style_2">
            <i class="icon_set_1_icon-57"></i>
            <h4>Need <span>Help?</span></h4>
            <a href="tel://09460718986" class="phone">+91 9460718986</a>
            <small>Monday to Sunday 11.00am - 8.00pm</small>
        </div>
        </aside><!--End aside -->
        
        <div class="col-lg-9 col-md-9">
            
           <div id="tools">
           <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="styled-select-filters">
                                <select name="sort_price" id="sort_price">
                                    <option value="" selected>Sort by price</option>
                                    <option value="lower">Lowest price</option>
                                    <option value="higher">Highest price</option>
                                </select>
                </div>
                </div>

            </div>
            </div><!--/tools -->
                @foreach($restaurants as $restaurant)
                <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                   <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="wishlist">
                            <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                        </div>      
                        <div class="img_list"><a href="{{ URL::asset('restaurants/'.$restaurant->slug) }}"><div class="ribbon popular" ></div><img src="{{ URL::asset($restaurant->banner_image_path) }}" alt="">
                        <div class="short_info"></div>
                        </a>
                        </div>
                    </div>
                     <div class="clearfix visible-xs-block"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="tour_list_desc">
                            <div id="score">Superb<span>9.0</span></div>
                            <div class="rating"><i class="icon-star voted"></i><i class="icon-star  voted"></i><i class="icon-star  voted"></i><i class="icon-star  voted"></i><i class="icon-star-empty"></i></div>
                            <h3><strong>{{ $restaurant->restaurant_name }}</strong> Restaurant</h3>
                            <p>{{ str_limit($restaurant->about, $limit = 100, $end = '...') }}</p>
                            <ul class="add_info">
                                <li>
                                     <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Free Wifi"><i class="icon_set_1_icon-86"></i></a>
                               </li>
                               <li>
                                     <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Plasma TV with cable channels"><i class="icon_set_2_icon-116"></i></a>
                               </li>
                                <li>
                                     <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Swimming pool"><i class="icon_set_2_icon-110"></i></a>
                               </li>
                               <li>
                                     <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Fitness Center"><i class="icon_set_2_icon-117"></i></a>
                               </li>
                               <li>
                                     <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Restaurant"><i class="icon_set_1_icon-58"></i></a>
                               </li>
                            </ul>
                            </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <div class="price_list"><div><sup>Rs</sup>{{ $restaurant->price}}*<span class="normal_price_list">Rs 1200</span><small >*Per Person</small>
                        <p><a href="{{ URL::asset('restaurants/'.$restaurant->slug) }}" class="btn_1">Details</a></p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div><!--End strip -->
                @endforeach
               
                <hr>

                <div class="text-center">
                    {{--<ul class="pagination">--}}
                        {{--<li><a href="#">Prev</a></li>--}}
                        {{--<li class="active"><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a href="#">Next</a></li>--}}
                    {{--</ul>--}}
                    {!! $restaurants->render() !!}
                </div><!-- end pagination-->
              
        </div><!-- End col lg-9 -->
    </div><!-- End row -->
</div><!-- End container -->
@stop
@section('myscript')

<script type="text/javascript">

$("#twotabsearchtextbox").autocomplete({
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
        selectedId: item.slug
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