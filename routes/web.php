<?php
//use Spatie\Analytics\Period;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    /**
     * Authentication routes
     */
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        /*
        * home route
        */
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);

        // Settings Page
        Route::get('/settings', 'SettingController@getIndex')->name('admin.settings');
        Route::post('/update-settings', 'SettingController@postUpdateSettings')->name('admin.update_settings');
        Route::post('/social-link', 'SettingController@postAddSocialLink')->name('admin.add_social_link');
        Route::post('/edit/social-link/{id}', 'SettingController@postUpdateSocialLink')->name('admin.update_social_link');
        Route::post('/delete-social-link/{id}', 'SettingController@postDeleteSocialLink')->name('admin.delete_social_link');

        // Users Page
        Route::get('/users', 'UserController@getIndex')->name('admin.users');
        Route::post('/users', 'UserController@postAddUser')->name('admin.add_user');
        Route::post('/update-chef', 'UserController@postUpdateUser')->name('admin.update_user');
        Route::post('/delete-chef', 'UserController@postDeleteUser')->name('admin.delete_user');

        // Cities and Kitchens Types
        Route::get('/cities_and_types', 'CityController@getIndex')->name('admin.cities_and_types');
        Route::post('/add_city', 'CityController@addCity')->name('admin.add_city');
        Route::post('/delete_city', 'CityController@deleteCity')->name('admin.delete_city');

        Route::post('/add_type', 'TypeController@addType')->name('admin.add_type');
        Route::post('/delete_type', 'TypeController@deleteType')->name('admin.delete_type');

        /**
         * subscribers routes
         */
        // Subscribe Page
        Route::get('/subscribe', 'SubscribeController@getIndex')->name('admin.subscribe');
        Route::get('/reply-subscribe/{id}', 'SubscribeController@getReply')->name('admin.get_reply_subscriber');
        Route::post('/reply-subscribe/{id}', 'SubscribeController@postReply')->name('admin.post_reply_subscriber');
        Route::get('/delete-subscribe/{id}', 'SubscribeController@getDelete')->name('admin.get_delete_subscriber');

        // Contacts Page
        Route::get('/contacts', 'ContactController@getIndex')->name('admin.contacts');
        Route::get('/reply-message/{id}', 'ContactController@getReply')->name('admin.get_reply_message');
        Route::post('/reply-message', 'ContactController@postReply')->name('admin.post_reply_message');
        Route::get('/delete-message/{id}', 'ContactController@deleteMessage')->name('admin.post_delete_message');


    });
});
/////////////// Site routes ////////////////////

Route::group(['namespace' => 'Site'], function() {
//
    // Home Page
    Route::get('/', 'HomeController@getIndex')->name('site.home');

    // Register and Login Routes
    Route::get('/registration', 'RegisterController@getIndex')->name('site.getRegister');
    Route::post('/registration', 'RegisterController@postRegister')->name('site.postRegister');

    Route::post('/login', 'LoginController@postLogin')->name('site.postLogin');

    // Chef Logout Route
    Route::get('/logout', 'RegisterController@getLogout')->name('site.getLogout');

    // Chef Profile Routes
    Route::get('/chef-profile/{id}', 'ChefController@getIndex')->name('site.chef-profile');
    Route::get('/update-chef-profile/{id}', 'ChefController@getUpdateChefProfile')->name('site.update-chef-profile');

    Route::post('/update-chef-profile/{id}', 'ChefController@postUpdateChefProfile')->name('site.post-update-chef');
    Route::get('/chef-orders/{id}/', 'ChefController@getChefOrders')->name('site.get_chef_orders');
    Route::get('/order/{id}/{order_id}/', 'ChefController@getChefSingleOrder')->name('site.get_single_order');

    Route::post('/order/{id}/', 'ChefController@updateChefSingleOrder')->name('site.update_order_status');

    Route::get('/chef-rates/{id}/', 'ChefController@getChefRates')->name('site.get_chef_rates');


    // Meal Routes
    Route::get('/add-meal/{id}', 'MealController@getIndex')->name('site.add-meal');
    Route::post('/add-meal/{id}', 'MealController@postAddMeal')->name('site.postAddMeal');

    Route::get('/update-meal/{id}/{ch_id}', 'MealController@getUpdateMeal')->name('site.getUpdateMeal');
    Route::post('/update-meal/{id}/{ch_id}', 'MealController@postUpdateMeal')->name('site.postUpdateMeal');

    Route::post('/delete-meal/{id}/', 'MealController@deleteMeal')->name('site.deleteMeal');



    Route::group(['middleware' => 'checkUser'], function () {
        // Normal User Routes
        Route::get('/user-profile/{id}', 'UserController@getIndex')->name('site.user-profile');
        Route::get('/update-user-profile/{id}', 'UserController@getUserProfile')->name('site.get-update-user-profile');
        Route::get('/user-orders/{id}', 'UserController@getUserOrders')->name('site.get-user-orders');

        Route::get('/orders/{id}/', 'UserController@getUserOrders')->name('site.get_user_orders');
        Route::get('/user-single-order/{id}/{order_id}/{chef_id}', 'UserController@getUserSingleOrder')->name('site.get_single_user_order');

        Route::post('/update-user-profile/{id}', 'UserController@postUserProfile')->name('site.postUpdateUser');

        // Rating Routes
        Route::get('/order-rating/{id}/{order_id}/{chef_id}', 'UserController@getUserRatingPage')->name('site.get_rating_page');
        Route::post('/rate-order/{id}/{order_id}/', 'UserController@postRateMeal')->name('site.post_feedback');

        // Normal User Search
        Route::post('/user-search/', 'UserController@postSearch')->name('site.user_search');
        Route::get('/kitchen/{id}/{ch_id}', 'UserController@getOneKitchen')->name('site.get_one_kitchen');

        Route::post('/search-meal/', 'UserController@postSearchByMeal')->name('site.search_by_meal');
        Route::get('/kitchen-rates/{id}', 'UserController@getKitchenRates')->name('site.get_kitchen_rates');

        // Add Kitchen To Favourites
        Route::post('/add-to-favourites/{id}/{user_id}', 'UserController@addToFavourite')->name('site.add_to_favourite');
        Route::get('/user-favourites/{id}', 'UserController@getUserFavourites')->name('site.get_user_favs');




        // Add To Cart Routes
        Route::get('add-to-cart/{id}/{ch_id}', 'UserController@getAddCart')->name('site.add_to_cart');
        Route::post('add-order/{id}/{ch_id}', 'UserController@postAddOrder')->name('site.post_add_order');

        Route::get('increase-by-one/{id}/{ch_id}', 'UserController@getIncreaseByOne')->name('site.increase-one');
        Route::get('reduce-by-one/{id}/{ch_id}', 'UserController@getReduceByOne')->name('site.reduce-one');

        Route::get('order-process/{id}/{ch_id}', 'UserController@getOrderProcess')->name('site.order_process');


        // Normal User Logout Route
        Route::get('/logouta', 'UserController@getLogout')->name('site.userGetLogout');

    });

    // Subscribe Routes
    Route::post('/subscribe', 'UserController@subscribe')->name('site.subscribe');
    // User Contact
    Route::post('/contact', 'UserController@postContact')->name('site.post_contact');


});
