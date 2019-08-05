<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\RestaurantImage;

use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RestaurantImagesController extends Controller
{
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
        $restaurant_images = DB::table('restaurant_images AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->select('ci.*', 'r.restaurant_name')
            ->get();


        return view("restaurants/restaurant_images.index",compact("restaurant_images"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = DB::table('restaurants')->select('restaurant_name','id')->get();

        return view('restaurants/restaurant_images.create',compact("restaurants"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,RestaurantImage::$rules);
        
        
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
        $restaurant_image = new RestaurantImage(array(
            'restaurant_id'=> $request->get('restaurant_id'),
            'title'=> $request->get('title'),
            'description'=>$request->get('description'),
            'image_path'=> $path,
        ));

        $restaurant_image->save();

        //RestaurantImage::create($request->all());

        return redirect('admin/restaurants/restaurant_images');
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant_image = RestaurantImage::findOrFail($id);

        $restaurants = DB::table('restaurants')->select('restaurant_name','id')->get();
        
        return view("restaurants/restaurant_images.edit",compact('restaurant_image','restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $this->validate($request,RestaurantImage::$edit_rules);
        $restaurant_images = RestaurantImage::findOrFail($id);

        
        $path = $request->get('old_image');

        if(Input::hasFile('image')){
            $file = Input::file('image');
            $tmpFilePath = '/uploads/RestaurantImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }

        $restaurant_images->restaurant_id=$request->get('restaurant_id');
        $restaurant_images->title=$request->get('title');
        $restaurant_images->description=$request->get('description');
        $restaurant_images->image_path=$path;

        $restaurant_images->save();
        // $restaurant_images->update($request->all());
        return redirect("admin/restaurants/restaurant_images");
    }
    public function destroy($id)
    {
        $rimage = RestaurantImage::find($id);

        if($rimage)
        {
            $rimage->delete();
            return redirect('admin/restaurants/restaurant_images')
                    ->with('message','rimage deleted.');
        }

        return redirect('admin/restaurants/restaurant_images')
                ->with('message','Something went wrong, please try again.');
    }
}
