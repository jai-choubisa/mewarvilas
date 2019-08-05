<?php

/**
 * Routes for guest user.
 */
Route::get('/', 'HomeController@index');
Route::get('restaurants', 'HomeController@restaurants');
Route::post('restaurants/search','HomeController@searchRestaurants');
Route::get('restaurants/{slug}','HomeController@showRestaurant');
Route::post('restaurants/find','HomeController@showRestaurantsByName');
Route::get('about-us', function () {
   return view('home/about');
});
Route::get('contact-us',function () {
   return view('home/contact');
});
Route::post('contact-us', 'HomeController@sendContactInfo');

/**
 * Routes for admin user.
 */
Route::group(['middleware' => ['auth','admin']], function()
{
    Route::resource('admin/countries','CountriesController');
    Route::resource('admin/states','StatesController');
    Route::resource('admin/cities','CitiesController');
    Route::resource('admin/restaurants/facilities','FacilitiesController');
    Route::resource('admin/restaurants/cuisines','CuisinesController');
    Route::resource('admin/restaurants/rfacilities','RfacilitiesController');
    Route::resource('admin/restaurants/rcuisines','RcuisinesController');
    Route::resource('admin/restaurants/deals','DealsController');
    Route::resource('admin/restaurants/restaurant_images','RestaurantImagesController');
    Route::resource('admin/restaurants/timings','TimingsController');
    Route::resource('admin/restaurants/menus','MenusController');
    Route::resource('admin/restaurants/events','EventsController');
    Route::resource('admin/restaurants/maps','MapsController');
    Route::resource('admin/restaurants','RestaurantsController');
    Route::get('admin/restaurant-orders','RestaurantOrdersController@allOrders');
    Route::post('admin/order/cancel/{id}','RestaurantOrdersController@destroy');
    Route::get('admin/customer-users','MyAdminController@allCustomerUsers');
    Route::get('admin/restaurant-users','MyAdminController@allRestaurantUsers');
    Route::get('admin/user-status/{id}/{state}','MyAdminController@userChangeStatus');
    Route::post('admin/user/delete/{id}','MyAdminController@destroyUser');
});

/*
****Authentication******
*/
// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
/*
****Authentication ends ******** -----------
*/

//Customer user
Route::get('/user/profile',['middleware' => ['auth','customer'], function () {
    return view("home.user.profile");
}]);
Route::group(['middleware' => ['auth','customer']], function()
{
    Route::get('/user/orders','RestaurantOrdersController@orderByUser');
    Route::post('order/cancel/{id}','RestaurantOrdersController@destroy');
    Route::post('user/update', 'HomeController@updateUser');
    Route::post('restaurant/bookorder','RestaurantOrdersController@store');
    Route::get('restaurant/bookorder','RestaurantOrdersController@getStore');
});
Route::post('restaurant/order','RestaurantOrdersController@confirmOrder');
Route::get('restaurant/order','RestaurantOrdersController@getConfirmOrder');
Route::post('home/restaurant', 'Auth\AuthController@postRegister');

// Restaurant Owner routes starts ******************************
Route::group(['middleware' => ['auth','restaurant_owner']], function()
{
    Route::get('restaurantview/dashboard','RestaurantViewController@dashboard');

    Route::get('restaurantview/orders','RestaurantOrdersController@orderByRestaurant');
    Route::get('restaurantview/daily-orders','RestaurantOrdersController@dailyOrderByRestaurant');
    
    Route::get('restaurantview/profile','RestaurantViewController@profileView');
    Route::post('restaurantview/profile','RestaurantViewController@profileUpdate');
    
    Route::post('restaurantview/add-image','RestaurantViewController@imagesAdd');
    Route::get('restaurantview/edit-image/{id}','RestaurantViewController@getImage');
    Route::post('restaurantview/update-image/{id}','RestaurantViewController@imageUpdate');
    Route::post('restaurantview/delete-image/{id}','RestaurantViewController@imageRemove');
    Route::get('restaurantview/images','RestaurantViewController@imagesView');
    
    Route::post('restaurantview/order/cancel/{id}','RestaurantOrdersController@destroy');

    Route::get('restaurantview/events','RestaurantViewController@eventsView');
    Route::post('restaurantview/add-event','EventsController@store');
    Route::get('restaurantview/edit-event/{id}','EventsController@edit');
    Route::post('restaurantview/update-event/{id}','EventsController@update');
    Route::post('restaurantview/delete-event/{id}','EventsController@destroy');
});
//REstaurant Owner routes ends ***************************************

