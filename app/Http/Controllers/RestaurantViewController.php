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
use App\RestaurantOrder;


use Illuminate\Http\Response;
use Carbon\Carbon;

use Session;
use Auth;
use App\Http\Requests\RestaurantRequest;
use DB;
use App\Quotation;

use \Input as Input;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RestaurantViewController extends Controller
{
    
    public function dashboard()
    {
        $order['thisweek'] = RestaurantOrder::whereBetween('date', [
                                            Carbon::parse('last monday')->startOfDay(),
                                            Carbon::parse('next friday')->endOfDay(),
                                        ])->where('restaurant_id',session('radmin_id'))
                                        ->count();
        
        $order['today'] = RestaurantOrder::where('date', date('Y-m-d'))->where('restaurant_id',session('radmin_id'))->count();
        $order['thismonth'] = RestaurantOrder::whereBetween('date', [
                                            Carbon::now()->startOfMonth(),
                                            Carbon::now()->endOfMonth(),
                                        ])->where('restaurant_id',session('radmin_id'))->count();
        $order['all'] = RestaurantOrder::where('restaurant_id',session('radmin_id'))->count();
        
        return view('restaurantview.dashboard')->with('order', $order);
    }

    public function profileView()
    {
        $restaurant = Restaurant::findOrFail(session('radmin_id'));
        $countries = DB::table('countries')->lists('name', 'id');
        $states = DB::table('states')->lists('name', 'id');
        $cities = DB::table('cities')->lists('name', 'id');
        
        return view('restaurantview.profile')->with('restaurant',$restaurant)->with('countries', $countries)->with('states', $states)->with('cities', $cities);
    }

    public function profileUpdate(RestaurantRequest $request)
    {
        $restaurant = Restaurant::findOrFail(session('radmin_id'));

        $path = $request->get('old_banner_image');

        if(Input::hasFile('banner_image')){
            $file = Input::file('banner_image');
            $tmpFilePath = '/uploads/BannerImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }

        $restaurant->restaurant_name = $request->get('restaurant_name');
        $restaurant->address = $request->get('address');
        $restaurant->country_id = $request->get('country_id');
        $restaurant->state_id = $request->get('state_id');
        $restaurant->city_id = $request->get('city_id');
        $restaurant->phone = $request->get('phone');
        $restaurant->price = $request->get('price');
        $restaurant->about = $request->get('about');
        $restaurant->banner_image_path = $path;

        $restaurant->save();


        Session::flash('flash_message', 'Restaurant Profile successfully updated!');
        
        $restaurant1 = Restaurant::findOrFail(session('radmin_id'));
        $countries = DB::table('countries')->lists('name', 'id');
        $states = DB::table('states')->lists('name', 'id');
        $cities = DB::table('cities')->lists('name', 'id');
        
        return view('restaurantview.profile')->with('restaurant',$restaurant1)->with('countries', $countries)->with('states', $states)->with('cities', $cities);
    }
    
    public function imagesView()
    {
        $restaurant_images = DB::table('restaurant_images')
                            ->where('restaurant_id',session('radmin_id'))
                            ->get();


        return view("restaurantview.gallery",compact("restaurant_images"));
    }

    public function getImage($id)
    {
        $restaurant_images = DB::table('restaurant_images')
                            ->where('restaurant_id',session('radmin_id'))
                            ->where('id',$id)
                            ->get();

        $restaurant_image = $restaurant_images[0];
        return response()->json($restaurant_image);
    }

    public function imageUpdate(Request $request,$id)
    {
        $this->validate($request, [
            'old_image' => 'required'
        ]);
        $rimages = RestaurantImage::findOrFail($id);

        //var_dump($request);
        //var_dump($rimages);exit;
        $path = $request->get('old_image');

        if(Input::hasFile('image')){
            $file = Input::file('image');
            $tmpFilePath = '/uploads/RestaurantImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }

        $rimages->restaurant_id=session('radmin_id');
        $rimages->title=$request->get('title');
        $rimages->description=$request->get('description');
        $rimages->image_path=$path;

        $rimages->save();
        
        return redirect('restaurantview/images')
                    ->with('message','Image updated successfully.');
    }

    public function imagesAdd(Request $request)
    {
        //$this->validate($request,RestaurantImage::$rules);
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,bmp,png'
        ]);
        
        $path = null;
        if(Input::hasFile('image')){
            //echo "Inside has file";
            $file = Input::file('image');
            $tmpFilePath = '/uploads/BannerImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }
        //echo $path;exit;
        $rimage = new RestaurantImage(array(
            'restaurant_id'=> session('radmin_id'),
            'title'=> $request->get('title'),
            'description'=>$request->get('description'),
            'image_path'=> $path,
        ));

        $rimage->save();

        return redirect('restaurantview/images')
                    ->with('message','Image added successfully.');
    }

    public function imageRemove($id)
    {
        $rimage = RestaurantImage::find($id);

        if($rimage)
        {
            $rimage->delete();
            return redirect('restaurantview/images')
                    ->with('message','Image deleted successfully.');
        }

        return redirect('restaurantview/images')
                ->with('message','Something went wrong, please try again.');
    }

    public function eventsView(){
        $events = DB::table('events')
                            ->where('restaurant_id',session('radmin_id'))
                            ->get();

        $restaurants = DB::table('restaurants')->lists('restaurant_name', 'id');

        return view("restaurantview.events",compact("events","restaurants"));
    }
}
