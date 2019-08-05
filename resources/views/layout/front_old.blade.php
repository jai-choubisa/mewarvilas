<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Restaurants, Hotels, Resorts, udaipur, find, book, travel,rajasthan" />
    <meta name="description" content="MewarVilas - Find & Book Restaurants,Hotels & Resorts in your city">
    <meta name="author" content="Choubisa Technologies">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>MewarVilas - Find & Book Restaurants,Hotels & Resorts in your city</title>
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ URL::asset("assets/img/favicon.png") }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ URL::asset("assets/img/apple-touch-icon-57x57-precomposed.png") }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ URL::asset("assets/img/apple-touch-icon-72x72-precomposed.png") }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ URL::asset("assets/img/apple-touch-icon-114x114-precomposed.png") }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ URL::asset("assets/img/apple-touch-icon-144x144-precomposed.png") }}">

   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Gochi+Hand|Lato:300,400' rel='stylesheet' type='text/css'>
   
	{{--Custom css--}}
    <link href="{{ URL::asset("assets/css/one2.min.css") }}" rel="stylesheet">
  
</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

     <!-- Header================================================== -->
    <header id="colored">
        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong>+91 9460718986</strong></div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <ul id="top_links">
                            <li>
                                <div class="dropdown dropdown-access">
                                    @if(Auth::check())
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link">Hello {{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                               <a class="btn btn-warning btn-sm col-md-12" href="{{ URL::asset("/user/profile") }}">Edit Profile</a>
                                            </div>
                                         </div>
                                         <hr class="hr-or">
                                         <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                               <a class="btn btn-info btn-sm col-md-12" href="{{ URL::asset("/user/orders") }}">Your Orders</a>
                                            </div>
                                        </div>
                                        <hr class="hr-or">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                               <a class="btn btn-danger btn-sm col-md-12" href="{{ URL::asset("/logout") }}">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link">Sign in</a>

                                    <div class="dropdown-menu">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a href="#" class="bt_facebook">
                                                    <i class="icon-facebook"></i>Facebook </a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a href="#" class="bt_paypal">
                                                    <i class="icon-paypal"></i>Paypal </a>
                                            </div>
                                        </div>
                                        <div class="login-or">
                                            <hr class="hr-or">
                                            <span class="span-or">or</span>
                                        </div>
                                        <form method="POST" action="/login">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputUsernameEmail" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                                        </div>
                                        <a id="forgot_pw" href="#">Forgot password?</a>
                                        <input type="submit" name="" value="Sign in" id="Sign_in" class="button_drop">
                                        <a href="{{ URL::asset("/register") }}" id="Sign_up" class="button_drop outline">Sign up</a>
                                        </form>
                                    </div>
                                    @endif
                                </div><!-- End Dropdown access -->
                            </li>
                            
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->
        
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo">
                        <a href="{{ URL::asset("/") }}"><img src="{{ URL::asset("assets/img/logo3.png") }}" height="34" alt="City tours" data-retina="true" class="logo_normal"></a>
                        <a href="{{ URL::asset("/") }}"><img src="{{ URL::asset("assets/img/logo3-dark.png") }}" height="34" alt="City tours" data-retina="true" class="logo_sticky"></a>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="{{ URL::asset("assets/img/logo-dark.png") }}" height="34" alt="City tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="{{ URL::asset("/") }}" class="show-submenu">Home</a>
                            </li>
                            <li class="submenu">
                                <a href="{{ URL::asset("/about-us") }}" class="show-submenu">About Us</a>
                            </li>
                            <li class="submenu">
                                <a href="{{ URL::asset("/restaurants") }}" class="show-submenu">Restaurants <i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Popular restaurants</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Top restaurants</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Latest restaurants</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Pure veg restaurants</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Non veg restaurats</a></li>

                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="{{ URL::asset("/restaurants") }}" class="show-submenu">Cusines <i class="icon-down-open-mini"></i></a>
                                 <ul>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Rajasthani</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">South Indian</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Fast Food</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Chinese</a></li>
                                    <li><a href="{{ URL::asset("/restaurants") }}">Continental</a></li>
                                </ul>
                            </li>
                            
                            <li class="submenu">
                                <a href="{{ URL::asset("/contact-us") }}" class="show-submenu">Contact Us</a>
                            </li>
                        </ul>
                    </div><!-- End main-menu -->
                    
                </nav>
            </div>
        </div><!-- container -->
    </header><!-- End Header -->
    
@if(Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
    

	    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://09460718986" id="phone">+91 9460718986</a>
                    <a href="mailto:help@citytours.com" id="email_footer">chobisaj@gmail.com</a>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>Top Cuisines</h3>
                    <ul>
                        <li><a href="#">Rajasthani</a></li>
                        <li><a href="#">Gujarati</a></li>
                        <li><a href="#">Chinese</a></li>
                        <li><a href="#">Punjabi</a></li>
                         <li><a href="#">South Indian</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>Top Locations</h3>
                    <ul>
                        <li><a href="#">Near Pichola Lake</a></li>
                        <li><a href="#">Near FatehSagar Lake</a></li>
                        <li><a href="#">Udiapole</a></li>
                         <li><a href="#">Shastri Circle</a></li>
                         <li><a href="#">New Bhupalpura</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-3">
                    <h3>Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Restaurants</a></li>
                         <li><a href="#">Cuisines</a></li>
                         <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-vimeo"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        </ul>
                        <p>© <a href="http://www.choubisatech.com" target="_blank">Choubisa Technologies</a> 2015</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<!--<script src="{{ URL::asset("assets/js/common_scripts_min.js") }}"></script>
<script src="{{ URL::asset("assets/js/functions.js") }}"></script>-->


 <!-- Specific scripts -->
<!--<script src="{{ URL::asset("assets/js/icheck.js") }}"></script>-->

<script src="{{ URL::asset("assets/js/one.min.js") }}"></script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
 <!--
 <script src="{{ URL::asset("assets/js/bootstrap-datepicker.js") }}"></script>
 <script src="{{ URL::asset("assets/js/bootstrap-timepicker.js") }}"></script>
 -->
 <script>
  $('input.date-pick').datepicker('setDate', 'today');
  $('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})
  </script>
  <!--
  <script src="{{ URL::asset("assets/js/jquery.ddslick.js") }}"></script>-->
   <script>
   $("select.ddslick").each(function(){
            $(this).ddslick({
                showSelectedHTML: true 
            });
        });
    </script>

    <!-- Single restaurant page -->
    <!-- Date and time pickers -->
<!--<script src="{{ URL::asset("assets/js/jquery.sliderPro.min.js") }}"></script>-->
<script type="text/javascript">
    $( document ).ready(function( $ ) {
        $( '#Img_carousel' ).sliderPro({
            width: 960,
            height: 500,
            fade: true,
            arrows: true,
            buttons: false,
            fullScreen: false,
            smallSize: 500,
            startSlide: 0,
            mediumSize: 1000,
            largeSize: 3000,
            thumbnailArrows: true,
            autoplay: false
        });
    });
</script>


 <!-- Map -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<!--<script src="{{ URL::asset("assets/js/map.js") }}"></script>
<script src="{{ URL::asset("assets/js/infobox.js") }}"></script>-->

 <!-- Carousel -->
<!--<script src="{{ URL::asset("assets/js/owl.carousel.min.js") }}"></script>-->

@yield('myscript')

<script>
$(document).ready(function(){   
        $(".carousel").owlCarousel({
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
        });



});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

</script>

{{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
  </body>
</html>