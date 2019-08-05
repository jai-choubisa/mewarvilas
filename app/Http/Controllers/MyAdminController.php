<?php

namespace App\Http\Controllers;

use Session;
use App\Restaurant;
use App\RestaurantOrder;
use App\User;
use Auth;
use Input;
use DB;
use App\Quotation;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allCustomerUsers()
    {
        $users = DB::table('users AS u')
            ->join('role_user AS r', 'r.user_id', '=', 'u.id')
            ->select('u.*')
            ->where('r.role_id', 3)
            ->get();


        return view("admin/customer-users",compact("users"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allRestaurantUsers()
    {
        $users = DB::table('users AS u')
            ->join('restaurants AS r', 'r.user_id', '=', 'u.id')
            ->join('role_user AS ru', 'ru.user_id', '=', 'u.id')
            ->select('u.*', 'r.restaurant_name')
            ->where('ru.role_id', 2)
            ->get();


        return view("admin/restaurant-users",compact("users"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userChangeStatus($id,$state)
    {
        $user = User::findOrFail($id);
        if($state){
            $user->active = 0;
        }else{
            $user->active = 1;
        }
        $user->save();

        return redirect()->back()
                ->with('message','Status Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = DB::table('users')->where('id', $id);
        $role_user = DB::table('role_user')->where('user_id', $id);
        if($user)
        {
            $role_user->delete();
            $user->delete();

            return redirect()->back()
                ->with('message','User deleted successfully.');
        }

        return redirect()->back()
            ->with('message','Something went wrong, please try again.');
    }      
}
