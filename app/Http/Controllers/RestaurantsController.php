<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\City;
use App\Restaurant;
use Auth;
use App\User;

use DB;
use App\Quotation;

// use Illuminate\Http\Request;
use Request;

use \Input as Input;

use App\Http\Requests;
use App\Http\Requests\RestaurantRequest;
use App\Http\Controllers\Controller;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
//        $this->middleware('auth');
        //$this->middleware('auth',['only'=>'create']);
        //$this->beforeFilter('csrf',array('on'=>'post'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //var_dump(Auth::user()->hasRole('restaurant_owner'));exit;

        $restaurants = DB::table('restaurants AS r')
            ->join('cities AS ci', 'ci.id', '=', 'r.city_id')
            ->join('states AS s', 's.id', '=', 'r.state_id')
            ->join('countries AS c', 'c.id', '=', 'r.country_id')
            ->select('r.*', 'c.name AS country','s.name AS state','ci.name AS city')
            ->get();


        return view("restaurants.index",compact("restaurants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = DB::table('countries')->lists('name', 'id');
        $states = DB::table('states')->lists('name', 'id');
        $cities = DB::table('cities')->lists('name', 'id');

        return view('restaurants.create')->with('countries', $countries)->with('states', $states)->with('cities', $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        //$input = Request::all();
        //Restaurant::create($input);
        //var_dump($request->file('banner_image_path'));exit;

        //create user email password
        $data = array();
        $data['name'] = $request->get('restaurant_name');
        $data['email'] = $request->get('email');
        $data['password'] = $request->get('password');

        $new_user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $new_user->assignRole('restaurant_owner');


        $path = null;
        if(Input::hasFile('banner_image')){
            $file = Input::file('banner_image');
            $tmpFilePath = '/uploads/BannerImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }



        $restaurant = new Restaurant(array(
            'user_id'=>$new_user->id,
            'restaurant_name'=>$request->get('restaurant_name'),
            'address'=>$request->get('address'),
            'country_id'=>$request->get('country_id'),
            'state_id'=>$request->get('state_id'),
            'city_id'=>$request->get('city_id'),
            'phone'=>$request->get('phone'),
            'price'=>$request->get('price'),
            'about'=>$request->get('about'),
            'banner_image_path'=> $path
        ));

        $restaurant->save();

        return redirect('admin/restaurants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $restaurant = Restaurant::findOrFail($id);
        return view("restaurant.show",compact("restaurant"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $countries = DB::table('countries')->lists('name', 'id');
        $states = DB::table('states')->lists('name', 'id');
        $cities = DB::table('cities')->lists('name', 'id');
        
        return view('restaurants.edit')->with('restaurant',$restaurant)->with('countries', $countries)->with('states', $states)->with('cities', $cities);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $path = $request->get('old_banner_image');

        if(Input::hasFile('banner_image')){
            $file = Input::file('banner_image');
            $tmpFilePath = '/uploads/BannerImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }

        $restaurant->user_id = $request->get('user_id');
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


        //$restaurant->update($request->all());
        return redirect("admin/restaurants");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);

        if($restaurant)
        {
            $restaurant->delete();
            return redirect('admin/restaurants')
                    ->with('message','Restaurant deleted.');
        }

        return redirect('admin/restaurants')
                ->with('message','Something went wrong, please try again.');
    }
}
