<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Menu;

use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class MenusController extends Controller
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
        $menus = DB::table('menus AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->select('ci.*', 'r.restaurant_name')
            ->get();


        return view("restaurants/menus.index",compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = DB::table('restaurants')->select('restaurant_name','id')->get();

        return view('restaurants/menus.create',compact("restaurants"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Menu::$rules);
        
        
        // $path = null;
        // if(Input::hasFile('image')){
        //     //echo "Inside has file";
        //     $file = Input::file('image');
        //     $tmpFilePath = '/uploads/Menus/';
        //     $tmpFileName = time() . '-' . $file->getClientOriginalName();
        //     $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
        //     $path = $tmpFilePath . $tmpFileName;
        // }
        // //echo $path;exit;
        // $menu = new Menu(array(
        //     'restaurant_id'=> $request->get('restaurant_id'),
        //     'image_path'=> $path,
        // ));

        // $menu->save();

        //Menu::create($request->all());

        $files = Input::file('images');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        foreach($files as $file) {
          $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){
            $destinationPath = '/uploads/Menus/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $upload_success = $file->move(public_path() .$destinationPath, $filename);
            $path = $destinationPath . $filename;

            $menu = new Menu(array(
                'restaurant_id'=> $request->get('restaurant_id'),
                'image_path'=> $path,
            ));

            $menu->save();

            $uploadcount ++;
          }
        }
        if($uploadcount == $file_count){
          //Session::flash('success', 'Upload successfully'); 
          return redirect('admin/restaurants/menus');
        } 
        else {
          return redirect('admin/restaurants/menus/create')->withInput()->withErrors($validator);
        }

        
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        $restaurants = DB::table('restaurants')->select('restaurant_name','id')->get();
        
        return view("restaurants/menus.edit",compact('menu','restaurants'));
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
        $this->validate($request,Menu::$edit_rules);
        $menus = Menu::findOrFail($id);

        
        $path = $request->get('old_image');

        if(Input::hasFile('image')){
            $file = Input::file('image');
            $tmpFilePath = '/uploads/Menus/';
            $tmpFileName = time() . '-' . $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;
        }

        $menus->restaurant_id=$request->get('restaurant_id');
        $menus->image_path=$path;

        $menus->save();
        // $menus->update($request->all());
        return redirect("admin/restaurants/menus");
    }
    public function destroy($id)
    {
        $rimage = Menu::find($id);

        if($rimage)
        {
            $rimage->delete();
            return redirect('admin/restaurants/menus')
                    ->with('message','rimage deleted.');
        }

        return redirect('admin/restaurants/menus')
                ->with('message','Something went wrong, please try again.');
    }
}
