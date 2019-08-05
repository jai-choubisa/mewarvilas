<?php

namespace App\Http\Controllers;

use App\Rcuisine;
use App\Cuisine;
use App\Restaurant;

use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RcuisinesController extends Controller
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
        $rcuisines = DB::table('rcuisines AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->select('ci.*', 'r.restaurant_name')
            ->get();
        return view("restaurants/rcuisines.index",compact("rcuisines"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = DB::table('restaurants')->lists('restaurant_name', 'id');
        $cuisines = DB::table('cuisines')->lists('name','name');
        
        return view('restaurants/rcuisines.create',compact("restaurants","cuisines"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Rcuisine::$rules);

        Rcuisine::create($request->all());

        return redirect('admin/restaurants/rcuisines');
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
        $rcuisine = Rcuisine::findOrFail($id);

        $restaurants = DB::table('restaurants')->lists('restaurant_name', 'id');
        $cuisines = DB::table('cuisines')->lists('name','name');
        return view("restaurants/rcuisines.edit",compact('rcuisine','restaurants',"cuisines"));
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
        $this->validate($request,Rcuisine::$rules);
        
        $rcuisine = Rcuisine::findOrFail($id);

        $rcuisine->update($request->all());
        return redirect("admin/restaurants/rcuisines");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rcuisine = Rcuisine::find($id);

        if($rcuisine)
        {
            $rcuisine->delete();
            return redirect('admin/restaurants/rcuisines')
                    ->with('message','rcuisine deleted.');
        }

        return redirect('admin/restaurants/rcuisines')
                ->with('message','Something went wrong, please try again.');
    }
}
