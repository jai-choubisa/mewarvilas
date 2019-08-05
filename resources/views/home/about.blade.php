@extends('layout.front')

@section('content')
<?php //var_dump($restaurants);exit; ?>
<section class="parallax-window" data-parallax="scroll" data-image-src="{{ URL::asset("assets/img/about-banner.jpg") }}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1>About Us</h1>
        <p>Know all about MewarVilas</p>
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
                    <li>About Us</li>
                    </ul>
        </div>
    </div><!-- Position -->
   
<div class="container margin_60">

    <div class="main_title">
        <h2>MewarVilas</h2>
        <p>A Website to book your favourite restaurants,hotels and resorts in udaipur.</p>
    </div>

<div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature">
                    <i class="icon_set_1_icon-30"></i>
                    <h3><!-- <span>+ 1000</span> --> Customers</h3>
                    <p>
                        Mewar vilas is used by large number of customers. Please join today and experience the luxury in affordable rates.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="feature">
                    <i class="icon_set_1_icon-57"></i>
                    <h3><span>Customer</span> Support</h3>
                    <p>
                        Our phone lines are available from moring 10:00 am to night 8:00 pm for customer support.
                    </p>
                </div>
            </div>
            </div><!-- End row -->
            <div class="row">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature">
                    <i class="icon_set_1_icon-57"></i>
                    <h3><span>Regular</span> Updation</h3>
                    <p>
                        We update our website daily and are synchronized with our restaurants,resort and hotels.
                    </p>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="feature">
                    <i class="icon_set_1_icon-61"></i>
                    <h3>Reliable</h3>
                    <p>
                        We provide reliable information of restaurants, resorts and hotels and are always ready to hear for customers feedback.
                    </p>
                </div>
            </div>
            </div><!-- End row -->
               
</div><!-- End container -->

            <div class="container margin_60">
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

        </div><!-- End Container -->
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