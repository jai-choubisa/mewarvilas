<?php

namespace App\Http\Controllers\Auth;


use App\Restaurant;
use App\RestaurantOrder;
use Input;
use Auth;
use Session;
use DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    private $redirectTo = '/';
    protected $loginPath = '/login'; // <--- note this
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone']
        ]);
    }

    protected function authenticated($request, $user)
    {
        if($user->hasRole('admin')) {
            return redirect()->intended('admin/restaurants/');
        }else if($user->hasRole('restaurant_owner')){
            $id = Auth::user()->id;
            $restaurants = DB::table('restaurants')->where('user_id', $id)->get();
            session(['radmin_name' => $restaurants[0]->restaurant_name,'radmin_id'=>$restaurants[0]->id]);
            return redirect()->intended('restaurantview/orders');
        }else if($user->hasRole('customer')){
            if(Session::has('restaurant_id') && Session::has('people')) {
            $restaurant = Restaurant::findOrFail(session('restaurant_id'));    
            $order = new RestaurantOrder(array(
                'restaurant_id' => session('restaurant_id'),
                'booking_no' => uniqid('MW'),
                'user_id' => Auth::user()->id,
                'people' => session('people'),
                'date' => session('date'),
                'time' => session('time')
            ));

            $order->save();
            //var_dump($order);echo $order->id;exit;
            
           
            //session['order_id'] = $order->id;
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

            return redirect('restaurant/bookorder');

            }else {
                return redirect()->intended('/');
            }
        }else{
            return redirect()->intended('logout');
        }

        return redirect()->intended('/');
    }
}
