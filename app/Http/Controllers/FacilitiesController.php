<?php

namespace App\Http\Controllers;

use App\Facility;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FacilitiesController extends Controller
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
        $facilities = Facility::latest('created_at')->get();
        return view("restaurants/facilities.index",compact("facilities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants/facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Facility::$rules);

        Facility::create($request->all());

        return redirect('admin/restaurants/facilities');
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
        $facility = Facility::findOrFail($id);
        
        return view("restaurants/facilities.edit",compact('facility'));
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
        $Facility = Facility::findOrFail($id);

        $Facility->update($request->all());
        return redirect("admin/restaurants/facilities");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Facility = Facility::find($id);

        if($Facility)
        {
            $Facility->delete();
            return redirect('admin/restaurants/facilities')
                    ->with('message','Facility deleted.');
        }

        return redirect('admin/restaurants/facilities')
                ->with('message','Something went wrong, please try again.');
    }
}
