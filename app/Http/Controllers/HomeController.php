<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\City;
use App\Restaurant;
use App\RestaurantImage;
use App\Timing;
use App\Menu;
use App\Event;
use App\Deal;
use App\Rcuisine;
use App\Rfacility;
use App\Cuisine;
use App\User;
use Illuminate\Support\Facades\Mail;

use SEO;

use Session;
use Auth;

use DB;
use App\Quotation;

use Illuminate\Http\Request;

use \Input as Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->beforeFilter('csrf',array('on'=>'post'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $restaurants = DB::table('restaurants AS r')
        //     ->select('r.*')
        //     ->get();
        $restaurants = Restaurant::latest('created_at')->take(8)->get();

        $newrestaurants = Restaurant::latest('created_at')->take(5)->get();

        $cuisines = Cuisine::latest('created_at')->take(5)->get();

        SEO::setTitle('MewarVilas');
        SEO::setDescription('Find & Book Best Restaurants in Udaipur');
        SEO::opengraph()->setUrl('http://www.mewarvilas.com');
        SEO::opengraph()->addProperty('type', 'restaurant');
        SEO::twitter()->setSite('@JaiChoubisa');

        return view("home.index",compact("restaurants","cuisines","newrestaurants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurants()
    {
        $restaurants = DB::table('restaurants AS r')
            ->join('cities AS ci', 'ci.id', '=', 'r.city_id')
            ->join('states AS s', 's.id', '=', 'r.state_id')
            ->join('countries AS c', 'c.id', '=', 'r.country_id')
            ->select('r.*', 'c.name AS country','s.name AS state','ci.name AS city')
            ->latest('r.created_at')
            ->paginate(5);

        SEO::setTitle('MewarVilas');
        SEO::setDescription('Find & Book Best Restaurants in Udaipur');
        SEO::opengraph()->setUrl('http://www.mewarvilas.com');
        SEO::opengraph()->addProperty('type', 'restaurant');
        SEO::twitter()->setSite('@JaiChoubisa');

        return view("home.restaurants",compact("restaurants"));
    }

    public function searchRestaurants(Request $request)
    {
        $word = $request->get('search_word');

        $restaurants = DB::table('restaurants')
            ->where('restaurant_name', 'like', $word.'%')
            ->get();

        SEO::setTitle('MewarVilas');
        SEO::setDescription('Find & Book Best Restaurants in Udaipur');
        SEO::opengraph()->setUrl('http://www.mewarvilas.com');
        SEO::opengraph()->addProperty('type', 'restaurant');
        SEO::twitter()->setSite('@JaiChoubisa');

        return response()->json($restaurants);
    }

    public function showRestaurantsByName(Request $request)
    {
        $word = $request->get('search_word');
        $date = $request->get('date');
        $time = $request->get('time');
        $people = $request->get('people');

//var_dump($request);exit;
        $restaurants = DB::table('restaurants AS r')
            ->join('cities AS ci', 'ci.id', '=', 'r.city_id')
            ->join('states AS s', 's.id', '=', 'r.state_id')
            ->join('countries AS c', 'c.id', '=', 'r.country_id')
            ->select('r.*', 'c.name AS country','s.name AS state','ci.name AS city')
            ->where('r.restaurant_name', 'like', $word.'%')
            ->latest('r.created_at')
            ->paginate(5);

        SEO::setTitle('MewarVilas');
        SEO::setDescription('Find & Book Best Restaurants in Udaipur');
        SEO::opengraph()->setUrl('http://www.mewarvilas.com');
        SEO::opengraph()->addProperty('type', 'restaurant');
        SEO::twitter()->setSite('@JaiChoubisa');

        return view("home.restaurants",compact("restaurants"));
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRestaurant($slug)
    {
        $restaurant = DB::table('restaurants')->where('slug', $slug)->get();
        $restaurant = $restaurant[0];
        $id = $restaurant->id;
        $restaurant_images = DB::table('restaurant_images')->where('restaurant_id', $id)->get();

        $timing = DB::table('timings')->where('restaurant_id', $id)->get();

        $menus = DB::table('menus')->where('restaurant_id', $id)->get();
        $events = DB::table('events')->where('restaurant_id', $id)->get();
        $deals = DB::table('deals')->where('restaurant_id', $id)->get();
        $cuisines = DB::table('rcuisines')->where('restaurant_id', $id)->get();
        $facilities = DB::table('rfacilities')->where('restaurant_id', $id)->get();

        SEO::setTitle($restaurant->restaurant_name.' Restaurant');
        SEO::setDescription($restaurant->about);
        SEO::opengraph()->setUrl('http://www.mewarvilas.com/'.$restaurant->slug);
        SEO::opengraph()->addProperty('type', 'restaurant');
        SEO::twitter()->setSite('@JaiChoubisa');

        return view("home.single.restaurant",compact("restaurant","restaurant_images",'timing','menus','events','deals','cuisines','facilities'));
    }

    public function updateUser(Request $request){
        //var_dump(Auth::user()->id);exit;
        $user = User::findOrFail(Auth::user()->id);
        //var_dump($user);exit;
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required'
        ]);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->save();
        Session::flash('flash_message', 'User Profile successfully updated!');
        return redirect()->back();

    }
 

    public function sendContactInfo(Request $request)
    {
        $this->validate($request,[
            'name_contact' => 'required',
            'email_contact' => 'required',
            'message_contact' => 'required'
            ]);
        
        $data = $request->only('name_contact', 'email_contact','phone_contact','lastname_contact');
        $data['messageLines'] = explode("\n", $request->get('message_contact'));

        Mail::send('emails.contact', $data, function ($message) use ($data) {
          $message->subject('MewarVilas Contact Form: '.$data['name_contact'])
                  ->to('chobisaj@gmail.com');
        });

        Mail::send('emails.contact_reply', $data, function ($message) use ($data) {
          $message->subject('Thank you for contacting MewarVilas')
                  ->to($data['email_contact']);
        });

        Session::flash('flash_message', 'Thank you! For contacting Us.Your message have been successfully received.');
        return redirect()->back();
    }
}
