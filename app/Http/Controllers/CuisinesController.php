<?php

namespace App\Http\Controllers;

use App\Cuisine;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CuisinesController extends Controller
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
        $cuisines = Cuisine::latest('created_at')->get();
        return view("restaurants/cuisines.index",compact("cuisines"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants/cuisines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Cuisine::$rules);

        Cuisine::create($request->all());

        return redirect('admin/restaurants/cuisines');
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
        $cuisine = Cuisine::findOrFail($id);
        
        return view("restaurants/cuisines.edit",compact('cuisine'));
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
        $Cuisine = Cuisine::findOrFail($id);

        $Cuisine->update($request->all());
        return redirect("admin/restaurants/cuisines");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Cuisine = Cuisine::find($id);

        if($Cuisine)
        {
            $Cuisine->delete();
            return redirect('admin/restaurants/cuisines')
                    ->with('message','Cuisine deleted.');
        }

        return redirect('admin/restaurants/cuisines')
                ->with('message','Something went wrong, please try again.');
    }
}
