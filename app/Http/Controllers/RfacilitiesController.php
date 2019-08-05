<?php

namespace App\Http\Controllers;

use App\Rfacility;
use App\Facility;
use App\Restaurant;

use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RfacilitiesController extends Controller
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
        $rfacilities = DB::table('rfacilities AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->select('ci.*', 'r.restaurant_name')
            ->get();
        return view("restaurants/rfacilities.index",compact("rfacilities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $restaurants = DB::table('restaurants')->lists('restaurant_name', 'id');
        $facilities = DB::table('facilities')->lists('name','name');
        return view('restaurants/rfacilities.create',compact("restaurants","facilities"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Rfacility::$rules);

        Rfacility::create($request->all());

        return redirect('admin/restaurants/rfacilities');
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
        $rfacility = Rfacility::findOrFail($id);

        $restaurants = DB::table('restaurants')->lists('restaurant_name', 'id');
        $facilities = DB::table('facilities')->lists('name','name');
        
        return view("restaurants/rfacilities.edit",compact('rfacility','restaurants',"facilities"));
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
        $this->validate($request,Rfacility::$rules);
        
        $rfacility = Rfacility::findOrFail($id);

        $rfacility->update($request->all());
        return redirect("admin/restaurants/rfacilities");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rfacility = Rfacility::find($id);

        if($rfacility)
        {
            $rfacility->delete();
            return redirect('admin/restaurants/rfacilities')
                    ->with('message','rfacility deleted.');
        }

        return redirect('admin/restaurants/rfacilities')
                ->with('message','Something went wrong, please try again.');
    }
}
