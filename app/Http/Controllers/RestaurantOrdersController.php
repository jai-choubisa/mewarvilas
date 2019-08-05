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

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RestaurantOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('restaurant_orders AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->join('users AS u', 'u.id', '=', 'ci.user_id')
            ->select('ci.*', 'r.restaurant_name','u.email','u.phone','u.name AS uname')
            ->get();


        return view("restaurants/events.index",compact("orders"));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allOrders()
    {
        $orders = DB::table('restaurant_orders AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->join('users AS u', 'u.id', '=', 'ci.user_id')
            ->select('ci.*', 'r.restaurant_name','u.email','u.phone','u.name AS uname')
            ->get();


        return view("restaurants/orders/all_orders",compact("orders"));
    }

    /**
     * Display a listing of the order by user.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderByUser()
    {
        $id = Auth::user()->id;
        $orders = DB::table('restaurant_orders AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->join('users AS u', 'u.id', '=', 'ci.user_id')
            ->select('ci.*', 'r.restaurant_name','u.email','r.banner_image_path')
            ->where('u.id', $id)
            ->get();

        return view("home.user.orders",compact("orders"));
    }

    /**
     * Display a listing of the order by restaurant.
     *
     * @return \Illuminate\Http\Response
     */
    public function dailyOrderByRestaurant()
    {
        $id = Auth::user()->id;
        //echo $id;
        $orders = DB::table('restaurant_orders AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->join('users AS u', 'u.id', '=', 'ci.user_id')
            ->select('ci.*', 'r.restaurant_name','u.email','u.name AS uname','u.phone AS uphone')
            ->where('r.user_id', $id)
            ->where('ci.date',date('Y-m-d'))
            ->get();
        //var_dump($orders);exit;

        return view("restaurantview.order_daily",compact("orders"));
    }

    /**
     * Display a listing of the order by restaurant.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderByRestaurant()
    {
        $id = Auth::user()->id;
        //echo $id;
        $orders = DB::table('restaurant_orders AS ci')
            ->join('restaurants AS r', 'r.id', '=', 'ci.restaurant_id')
            ->join('users AS u', 'u.id', '=', 'ci.user_id')
            ->select('ci.*', 'r.restaurant_name','u.email','u.name AS uname','u.phone AS uphone')
            ->where('r.user_id', $id)
            ->get();
        //var_dump($orders);exit;

        return view("restaurantview.orders",compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants/events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo session('people');exit;
        if(Session::has('restaurant_id') && Session::has('people')) {
            $order = new RestaurantOrder(array(
                'restaurant_id' => session('restaurant_id'),
                'booking_no' => uniqid('MW'),
                'user_id' => Auth::user()->id,
                'people' => session('people'),
                'date' => session('date'),
                'time' => session('time')
            ));

            $order->save();



            Session::put('order_id', $order->id);
            
            $myuser = User::findOrFail($order->user_id);

            //var_dump($order);echo $order->id;exit;
            $restaurant = Restaurant::findOrFail(session('restaurant_id'));

            $data['order'] = $order;
            $data['restaurant'] = $restaurant;
            $data['myuser'] = $myuser;

            Mail::send('emails.book_order', $data, function ($message) use ($data) {
              $message->subject('Order Confirmation - Your order with MewarVilas.com ['.$data['order']->booking_no.'] has been successfully placed')
                      ->to($data['myuser']->email);
            });

            

            return view("home.confirm_order",compact("restaurant","order"));
        }else{
            return view("login")->with('message', 'Error placing Order!');;
        }
    }

    public function getStore()
    {
        if(Session::has('restaurant_id') && Session::has('people') && Session::has('order_id')) {
            
            $restaurant = Restaurant::findOrFail(session('restaurant_id'));
            $order = DB::table('restaurant_orders')->where('order_id', session('order_id'))->get();

            $order = $order[0];

            return view("home.confirm_order",compact("restaurant","order"));
        }else{
            return redirect()->intended('/');
        }
    }

    public function confirmOrder(Request $request)
    {
        $this->validate($request,RestaurantOrder::$rules);

        $date = date("Y-m-d", strtotime(Input::get('date')));
        $restaurant = Restaurant::findOrFail($request->get('restaurant_id'));
        if($restaurant->restaurant_name)
        {
        session([
            'restaurant_id'=>$request->get('restaurant_id'),
            'people'=>$request->get('people'),
            'date'=>$date,
            'time'=>$request->get('time'),
            'restaurant_name'=> $restaurant->restaurant_name,
            'restaurant_image'=> $restaurant->banner_image_path,
            'restaurant_price'=> $restaurant->price
        ]);

        return view("home.booking_reserve");
        }
        else{
            return redirect()->back();
        }
    }

    public function getConfirmOrder()
    {
        return view("home.booking_reserve");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginBeforeOrder(Request $request)
    {
        $this->validate($request,RestaurantOrder::$rules);

        $date = date("Y-m-d", strtotime(Input::get('date')));

        $request->session()->put('restaurant_id','$request->get("restaurant_id")');
        $request->session()->put('user_id','Auth::user()->id")');
        $request->session()->put('people','$request->get("people")');
        $request->session()->put('date',$date);
        $request->session()->put('time','$request->get("time")');

        return view("home.login_before_order");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->hasRole('customer')){
            $order = DB::table('restaurant_orders')->where('order_id', $id)->where('user_id', Auth::user()->id);    
        }elseif (Auth::user()->hasRole('restaurant_owner')) {
            $resOrder = DB::table('restaurant_orders AS ru')
                    ->join('restaurants AS r', 'r.id', '=', 'ru.restaurant_id')
                    ->select('ru.*')
                    ->where('ru.order_id', $id)        
                    ->where('r.user_id', Auth::user()->id)
                    ->get();
            if($resOrder){
                $order = DB::table('restaurant_orders')->where('order_id', $id); 
            }

        }else{
            $order = DB::table('restaurant_orders')->where('order_id', $id);       
        }


        if($order)
        {
            $del_order = $order->get();
            $del_order = $del_order[0];
            $myuser = User::findOrFail($del_order->user_id);

            $data['order'] = $del_order;
            $data['myuser'] = $myuser;

            Mail::send('emails.cancel_order', $data, function ($message) use ($data) {
              $message->subject('Cancellation Confirmation')
                      ->to($data['myuser']->email);
            });

            $order->delete();
            
            return redirect()->back()
                ->with('message','Restaurant Order deleted.');
        }

        return redirect()->back()
            ->with('message','Something went wrong, please try again.');
    }
}
