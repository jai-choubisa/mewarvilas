@extends('layout.front')

@section('content')
<?php //var_dump($restaurants);exit; ?>
<section class="parallax-window" data-parallax="scroll" data-image-src="{{ URL::asset("assets/img/contact-banner.jpg") }}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
            <h1 style="color:#FF2F2F;">Contact Us</h1>
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
   
<div class="container margin_60" style="padding-top:3em;">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="form_title">
                <h3><strong><i class="icon-pencil"></i></strong>Fill the form below</h3>
                
            </div>
            <div class="step">
            
                <div id="message-contact"></div>
                {!! Form::open(["url" => "contact-us",'id'=>'contactform']) !!}
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Enter Last Name">
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Enter Phone number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="Write your message" style="height:200px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" value="Submit" class="btn_1" id="submit-contact">
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- End col-md-8 -->
        
        <div class="col-md-4 col-sm-4">
            <div class="box_style_1">
                <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
                <p>
                    2-I block, Rajasthan Hospital Road, Secto-14, Udaipur, Rajasthan, India 313002
                </p>
                <hr>
                <h4>Contact Us</h4>
                <ul id="contact-info">
                    <li>+91 9460718986 / + 91 9414237277</li>
                    <li><a href="#">chobisaj@gmail.com</a></li>
                </ul>
            </div>
            
        </div><!-- End col-md-4 -->
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