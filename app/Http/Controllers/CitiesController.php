<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\City;

use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
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
        $cities = DB::table('cities AS ci')
            ->join('states AS s', 's.id', '=', 'ci.state_id')
            ->join('countries AS c', 'c.id', '=', 'ci.country_id')
            ->select('ci.*', 'c.name AS country','s.name AS state')
            ->get();


        return view("cities.index",compact("cities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $users = DB::table('countries')->select('name','id')->get();

        $states = $users = DB::table('states')->select('name','id')->get();

        return view('cities.create',compact("countries",'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,City::$rules);

        City::create($request->all());

        return redirect('admin/cities');
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
        $countries = $users = DB::table('countries')->select('name','id')->get();

        $states = $users = DB::table('states')->select('name','id')->get();

        $city = City::findOrFail($id);
        
        return view("cities.edit",compact('city','countries','states'));
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
        $city = City::findOrFail($id);

        $city->update($request->all());
        return redirect("admin/cities");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        if($city)
        {
            $city->delete();
            return redirect('admin/cities')
                    ->with('message','City deleted.');
        }

        return redirect('admin/cities')
                ->with('message','Something went wrong, please try again.');
    }
}
