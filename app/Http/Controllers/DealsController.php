<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Deal;

use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class DealsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = DB::table('deals AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->select('ci.*', 'r.restaurant_name')
            ->get();


        return view("restaurants/deals.index",compact("deals"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = DB::table('restaurants')->select('restaurant_name','id')->get();

        return view('restaurants/deals.create',compact("restaurants"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Deal::$rules);

        $from_date = date("Y-m-d", strtotime(Input::get('from_date')));
        $to_date = date("Y-m-d", strtotime(Input::get('to_date')));

        $deal = new Deal(array(
            'restaurant_id'=>$request->get('restaurant_id'),
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'discount'=>$request->get('discount'),
            'deal'=>$request->get('deal'),
        ));

        $deal->save();

        //Deal::create($request->all());

        return redirect('admin/restaurants/deals');
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

        $deal = Deal::findOrFail($id);
        //print_r($deal->attributes);exit;
        $input  = $deal->from_date;
        // $format = 'm/d/Y';

        $fromdate = Carbon::createFromFormat('Y-m-d', $input)->format('d/m/Y');
        $input2 = $deal->to_date;

        $todate = Carbon::createFromFormat('Y-m-d', $input2)->format('d/m/Y');
        
        return view("restaurants/deals.edit",compact('deal','restaurants','fromdate','todate'));
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
        $this->validate($request,Deal::$rules);

        $from_date = date("Y-m-d", strtotime($request->get('from_date')));
        $to_date = date("Y-m-d", strtotime($request->get('to_date')));
        
        $deal = Deal::findOrFail($id);

        // $painting->title = "Game of thrones season 6";
        $deal->restaurant_id= $request->get('restaurant_id');
        $deal->from_date= $from_date;
        $deal->to_date= $to_date;
        $deal->discount= $request->get('discount');
        $deal->deal= $request->get('deal');
        
        $deal->save();

        //$deal->update($request->all());
        return redirect("admin/restaurants/deals");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal = Deal::find($id);

        if($deal)
        {
            $deal->delete();
            return redirect('admin/restaurants/deals')
                    ->with('message','Deal deleted.');
        }

        return redirect('admin/restaurants/deals')
                ->with('message','Something went wrong, please try again.');
    }
}
