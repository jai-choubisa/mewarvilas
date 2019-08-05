@extends('layout.front')

@section('content')
<?php //var_dump($restaurant);
//var_dump($restaurant_images);
//var_dump($timing);
//exit; ?>
 <section class="parallax-window" data-parallax="scroll" data-image-src="{{ URL::asset($restaurant->banner_image_path) }}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class=" icon-star-empty"></i></span>
                    <h1>{{ $restaurant->restaurant_name }} Restaurant</h1>
                    <span>{{ $restaurant->address }}</span><br>
                    @if(count($timing)>0)
            <span>Timings {{ $timing[0]->start_time }} to {{ $timing[0]->end_time }}</span>
            @endif
                </div>
                <div class="col-md-4 col-sm-4">
                    <div id="price_single_main" class="hotel">
                        from/per person <span><sup>Rs</sup>{{ $restaurant->price }}</span>
                        
                        @if(count($deals)>0)
                            @foreach($deals as $deal)
                                @if($deal->discount)    
                                    <h4 style="color:white;">{{ $deal->discount }} % Off Available</h4>
                                    <?php break; ?>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- End section -->

    <div id="position">
            <div class="container">
                        <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Restaurants</a></li>
                        <li>{{ $restaurant->restaurant_name }}</li>
                        </ul>
            </div>
    </div><!-- End Position -->

    
     <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div><!-- End Map -->
    
    <div class="container margin_60">
   
    <div class="row">
        <div class="col-md-8" id="single_tour_desc">
            
            <p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a></p><!-- Map button for tablets/mobiles -->
            @if(count($restaurant_images)>0)
            <div id="Img_carousel" class="slider-pro">
                <div class="sp-slides">
                    @foreach($restaurant_images as $image)
                    
                    
                    <div class="sp-slide">
                        <img alt="" class="sp-image" src="{{ URL::asset($image->image_path) }}" 
                        data-src="{{ URL::asset($image->image_path) }}" 
                        data-small="{{ URL::asset($image->image_path) }}" 
                        data-medium="{{ URL::asset($image->image_path) }}" 
                        data-large="{{ URL::asset($image->image_path) }}" 
                        data-retina="{{ URL::asset($image->image_path) }}">
                        <h3 class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="40" data-show-transition="left">
                        {{ $image->title }} </h3>
                        <p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-vertical="0" data-width="100%" data-show-transition="up">
                             {{ $image->description }}
                        </p>
                    </div>
                    @endforeach
                </div>
                <div class="sp-thumbnails">
                @foreach($restaurant_images as $image)
                    <img alt="" class="sp-thumbnail" src="{{ URL::asset($image->image_path) }}">
                   @endforeach
                </div>
            </div>
            @endif
            <hr>
            
            <div class="row">
                <div class="col-md-3">
                    <h3>Description</h3>
                </div>
                <div class="col-md-9">
                    <p>
                        {{ $restaurant->about }}
                    </p>
                    <h4>Restaurant facilities</h4>
                    <!-- <p>
                        Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.
                    </p> -->

                    <div class="row">
                        @if(count($facilities)>0)
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                @foreach($facilities as $facility)
                                <li>{{ $facility->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(count($cuisines)>0)
                        <div class="col-md-6 col-sm-6">
                            <ul class="list_ok">
                                @foreach($cuisines as $cuisine)
                                <li>{{ $cuisine->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div><!-- End row  -->
                </div><!-- End col-md-9  -->
            </div><!-- End row  -->
            
            <hr>
            @if(count($menus)>0)
            <div class="row">
                <div class="col-md-3">
                    <h3>Menu</h3>
                </div>
                <div class="col-md-9">
                     <div class="carousel magnific-gallery">
                        @foreach($menus as $menu)
                        <div class="item">
                            <a href="{{ URL::asset($menu->image_path) }}"><img src="{{ URL::asset($menu->image_path) }}" alt="Image"></a>
                        </div>
                        @endforeach
                     </div><!-- End photo carousel  -->
                     
                </div><!-- End col-md-9  -->
            </div><!-- End row  -->
            
            <hr>
            @endif
            @if(count($deals)>0)
            <div class="row">
            <div class="col-md-3">
                    <h3>Deals</h3>
                </div>
                <div class="col-md-9">
                    <?php $i=1; ?>
                    @foreach($deals as $deal)
                        @if($i>1)
                            <hr>
                        @endif
                    @if($deal->deal)    
                    <h4>{{ $deal->deal }}</h4>
                    <p>From {{ $deal->from_date }} to {{ $deal->to_date }} </p>
                    <?php $i++; ?>
                    @endif
                    
                    
                    @endforeach
                </div><!-- End col-md-9  -->
            </div><!-- End row  -->
            
            <hr>
            @endif

            @if(count($events)>0)
            <div class="row">
                <div class="col-md-3">
                    <h3>Events</h3>
                </div>
                <div class="col-md-9">
                    <?php $i=1; ?>
                     @foreach($events as $event)
                        @if($i>1)
                            <hr>
                        @endif
                     <h4>{{ $event->name }}</h4>
                    <p>{{ $event->description }}</p>
                    
                    <p>Date :- {{ $event->from_date }} to {{ $event->to_date }} </p>
                    <p>Timings :- {{ $event->start_time }} to {{ $event->end_time }} </p>

                     <div class="carousel magnific-gallery">
                        <div class="item">
                            <a href="{{ URL::asset($event->image_path) }}"><img src="{{ URL::asset($event->image_path) }}" alt="Image"></a>
                        </div>
                     </div><!-- End photo carousel  -->
                     @endforeach
                </div><!-- End col-md-9  -->
            </div><!-- End row  -->
            
            <hr>
            @endif
            <div class="row">
                <div class="col-md-3">
                    <h3>Reviews</h3>
                </div>
                <div class="col-md-9">
                    <div id="score_detail"><span>7.5</span>Good <small>(Based on 34 reviews)</small></div><!-- End general_rating -->
                    <div class="row" id="rating_summary">
                        <div class="col-md-6">
                            <ul>
                                <li>Position
                                    <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                    </div>
                                </li>
                                <li>Comfort
                                <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>Price
                                <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                    </div>
                                </li>
                                <li>Quality
                                <div class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- End row -->
                    <hr>
                    <div class="review_strip_single">
                        <img src="{{ URL::asset("assets/img/avatar1.jpg") }}" alt="" class="img-circle">
                        <small> - 10 March 2015 -</small>
                        <h4>Jhon Doe</h4>
                        <p>
                             "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                        </div>
                    </div><!-- End review strip -->
                    
                    <div class="review_strip_single">
                        <img src="{{ URL::asset("assets/img/avatar2.jpg") }}" alt="" class="img-circle">
                        <small> - 10 March 2015 -</small>
                        <h4>Jhon Doe</h4>
                        <p>
                             "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                        </div>
                    </div><!-- End review strip -->
                    
                    <div class="review_strip_single last">
                        <img src="{{ URL::asset("assets/img/avatar3.jpg") }}" alt="" class="img-circle">
                        <small> - 10 March 2015 -</small>
                        <h4>Jhon Doe</h4>
                        <p>
                             "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                        </div>
                    </div><!-- End review strip -->
                </div>
            </div>
        </div><!--End  single_tour_desc-->
        
        <aside class="col-md-4">
        <p class="hidden-sm hidden-xs">
            <a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">View on map</a>
        </p>
                     
        <div class="box_style_1 expose">
            <h3 class="inner">Reserve table</h3>
            {!! Form::open(["url" => "restaurant/order","class"=>"form-horizontal push-5-t"]) !!}
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label><i class="icon-calendar-7"></i> Date</label>
                        <input class="date-pick form-control" name="date" data-date-format="M d, D" type="text">
                        <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->id  }}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <label><i class="icon-calendar-7"></i> Time</label>
                        <input class="time-pick form-control" name="time" value="12:00 PM" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>People</label>
                        <div class="numbers-row">
                            <input type="text" value="1" id="people" class="qty2 form-control" name="people">
                        </div>
                    </div>
                </div>
            </div>
            <br>
           <button type="submit" class="btn_full">Reserve Now</button>
            {!! Form::close() !!}
        </div><!--/box_style_1 -->
        
        <div class="box_style_4">
            <i class="icon_set_1_icon-90"></i>
            <h4><span>Need Help</h4>
            <a href="tel://9460718986" class="phone">9460718986</a>
        </div>
        
        </aside>


    </div><!--End row -->

    </div><!--End container -->



@stop