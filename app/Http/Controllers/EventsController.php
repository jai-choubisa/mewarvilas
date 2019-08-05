<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Event;

use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class EventsController extends Controller
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
        $events = DB::table('events AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->select('ci.*', 'r.restaurant_name')
            ->get();


        return view("restaurants/events.index",compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = DB::table('restaurants')->lists('restaurant_name', 'id');

        return view('restaurants/events.create',compact("restaurants"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Event::$rules);
        
        if(session('radmin_id')){
            $rid = session('radmin_id');
        }elseif ($request->get('restaurant_id')) {
            $rid = $request->get('restaurant_id');
        }else{
            return redirect()->back()
                    ->with('message','Form was not filled correctly. Please Try again.');
        }
        
        $from_date = date("Y-m-d", strtotime(Input::get('from_date')));
        $to_date = date("Y-m-d", strtotime(Input::get('to_date')));
//var_dump($request);exit;
        $path = null;
        if(Input::hasFile('image')){
            //echo "Inside has file";
            $file = Input::file('image');
            $tmpFilePath = '/uploads/EventImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }

        $event = new Event(array(
            'restaurant_id'=>$rid,
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'start_time'=>$request->get('start_time'),
            'end_time'=>$request->get('end_time'),
            'image_path'=> $path,
        ));

        $event->save();

        //Event::create($request->all());
        if(session('radmin_id')){
            return redirect('restaurantview/events');
        }
        return redirect('admin/restaurants/events');
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
       $restaurants = DB::table('restaurants')->lists('restaurant_name', 'id');

        $event = Event::findOrFail($id);
        //print_r($event->attributes);exit;
        $input  = $event->from_date;
        // $format = 'm/d/Y';

        $fromdate = Carbon::createFromFormat('Y-m-d', $input)->format('m/d/Y');
        $input2 = $event->to_date;

        $todate = Carbon::createFromFormat('Y-m-d', $input2)->format('m/d/Y');
        
        
        if(session('radmin_id')){
            $data = array();
            $data['eventvar'] = $event;
            $data['fromdate'] = $fromdate;
            $data['todate'] = $todate;
            return response()->json($data);
        }
        return view("restaurants/events.edit",compact('event','restaurants','fromdate','todate'));
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
        //var_dump($request);exit;
        $this->validate($request,Event::$rules);
        if(session('radmin_id')){
            $rid = session('radmin_id');
        }elseif ($request->get('restaurant_id')) {
            $rid = $request->get('restaurant_id');
        }else{
            return redirect()->back()
                    ->with('message','Form was not filled correctly. Please Try again.');
        }

        $from_date = date("Y-m-d", strtotime($request->get('from_date')));
        $to_date = date("Y-m-d", strtotime($request->get('to_date')));
        //var_dump($request->get('from_date'));exit;
        $event = Event::findOrFail($id);

        $path = $request->get('old_image');

        if(Input::hasFile('image')){
            $file = Input::file('image');
            $tmpFilePath = '/uploads/EventImages/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }

        // $painting->title = "Game of thrones season 6";
        $event->restaurant_id= $rid;
        $event->from_date= $from_date;
        $event->to_date= $to_date;
        $event->description= $request->get('description');
        $event->name= $request->get('name');
        $event->start_time= $request->get('start_time');
        $event->end_time= $request->get('end_time');
        $event->image_path= $path;
        
        $event->save();

        if(session('radmin_id')){
            return redirect('restaurantview/events');
        }
        //$event->update($request->all());
        return redirect("admin/restaurants/events");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if($event)
        {
            $event->delete();
            if(session('radmin_id')){
                return redirect('restaurantview/events')->with('message','event deleted.');
            }
            return redirect('admin/restaurants/events')
                    ->with('message','event deleted.');
        }

        return redirect('admin/restaurants/events')
                ->with('message','Something went wrong, please try again.');
    }
}
