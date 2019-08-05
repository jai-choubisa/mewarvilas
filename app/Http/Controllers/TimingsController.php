<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\timing;

use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class TimingsController extends Controller
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
        $timings = DB::table('timings AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->select('ci.*', 'r.restaurant_name')
            ->get();


        return view("restaurants/timings.index",compact("timings"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = DB::table('restaurants')->select('restaurant_name','id')->get();

        return view('restaurants/timings.create',compact("restaurants"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Timing::$rules);

        $timing = new Timing(array(
            'restaurant_id'=>$request->get('restaurant_id'),
            'start_time'=>$request->get('start_time'),
            'end_time'=>$request->get('end_time'),
        ));

        $timing->save();

        //Timing::create($request->all());

        return redirect('admin/restaurants/timings');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurants = DB::table('restaurants')->select('restaurant_name','id')->get();

        $timing = Timing::findOrFail($id);
        
        return view("restaurants/timings.edit",compact('timing','restaurants'));
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
        $this->validate($request,Timing::$rules);

        $timing = Timing::findOrFail($id);

        // $painting->title = "Game of thrones season 6";
        $timing->restaurant_id= $request->get('restaurant_id');
        $timing->start_time= $request->get('start_time');
        $timing->end_time= $request->get('end_time');
        
        $timing->save();

        //$timing->update($request->all());
        return redirect("admin/restaurants/timings");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timing = Timing::find($id);

        if($timing)
        {
            $timing->delete();
            return redirect('admin/restaurants/timings')
                    ->with('message','timing deleted.');
        }

        return redirect('admin/restaurants/timings')
                ->with('message','Something went wrong, please try again.');
    }
}
