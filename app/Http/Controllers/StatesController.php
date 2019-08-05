<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;


use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatesController extends Controller
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
        $countries = Country::latest('created_at')->get();

        $states = DB::table('states AS s')
            ->join('countries AS c', 'c.id', '=', 's.country_id')
            ->select('s.*', 'c.name AS country')
            ->get();


        return view("states.index",compact("states"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $users = DB::table('countries')->select('name','id')->get();
        
        return view('states.create',compact("countries"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,State::$rules);

        State::create($request->all());

        return redirect('admin/states');
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

        $state = State::findOrFail($id);
        
        return view("states.edit",compact('state','countries'));
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
        $state = State::findOrFail($id);

        $state->update($request->all());
        return redirect("admin/states");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);

        if($state)
        {
            $state->delete();
            return redirect('admin/states')
                    ->with('message','State deleted.');
        }

        return redirect('admin/states')
                ->with('message','Something went wrong, please try again.');
    }
}
