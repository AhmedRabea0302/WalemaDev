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

        /*
         * profile routes
         */});
//        Route::group(['prefix' => 'profile'], function () {
//            Route::get('/', ['as' => 'admin.profile', 'uses' => 'ProfileController@getIndex']);
//            Route::post('/', ['as' => 'admin.profile', 'uses' => 'ProfileController@postIndex']);
//        });
//
//        /**
//         * subscribers routes
//         */
//        Route::group(['prefix' => 'subscribers'], function () {
//            Route::get('/', 'SubscriberController@getIndex')->name('admin.subscribtions.index');
//            Route::post('/send', 'SubscriberController@postSend')->name('admin.subscribtions.send');
//            Route::post('/action/{action}', 'SubscriberController@postAction');
//            Route::get('/filter/{filter}', 'SubscriberController@getFilter');
//            Route::get('/search/{q?}', 'SubscriberController@getSearch');
//            Route::get('/delete/{id}', 'SubscriberController@getDelete')->name('admin.subscribtions.delete');
//        });
//
//
//
//        // Static Pages
//        Route::get('/static-pages/clinic', 'StaticPageController@getIndex')->name('admin.static_pages');
//        Route::post('/static-pages/update-clinic', 'StaticPageController@postUpdateClinicService')->name('admin.update_clinic_service');
//        Route::post('/static-pages/update-doctors', 'StaticPageController@postUpdateDoctors')->name('admin.update_doctors');
//        Route::post('/static-pages/update-success', 'StaticPageController@postUpdateSuccess')->name('admin.update_success');
//        Route::post('/static-pages/update-contact', 'StaticPageController@postUpdateContact')->name('admin.update_contact');
//        Route::post('/static-pages/update-leader', 'StaticPageController@postUpdateLeader')->name('admin.update_leader');
//        Route::post('/static-pages/update-subscribe', 'StaticPageController@postUpdateSubscribe')->name('admin.update_subscribe');
//
//        // Slider Page
//        Route::get('/slider', 'SliderController@getIndex')->name('admin.slider');
//        Route::post('/slider', 'SliderController@addSlider')->name('admin.add_slider');
//
//        Route::get('/update-slider/{id}', 'SliderController@getUpdateSlider')->name('admin.get_update_slider');
//        Route::post('/update-slider/{id}', 'SliderController@postUpdateSlider')->name('admin.update_slider');
//
//        Route::get('/delete-slider/{id}', 'SliderController@getDeleteSlider')->name('admin.delete_slider');
//
//        // About Us Page
//        Route::get('/about', 'AboutController@getIndex')->name('admin.about');
//        Route::post('/update-about', 'AboutController@postUpdateAbout')->name('admin.update_about');
//
//        // Testimonials Page
//        Route::get('/testimonials', 'TestimonialController@getIndex')->name('admin.testimonials');
//        Route::post('/add-testimonials', 'TestimonialController@postAddTestimonial')->name('admin.add_testimonial');
//        Route::get('/update-testimonials/{id}', 'TestimonialController@getTestimonial')->name('admin.get_update_testimonial');
//        Route::post('/update-testimonials/{id}', 'TestimonialController@postUpdateTestimonial')->name('admin.post_update_testimonial');
//        Route::get('/delete-testimonials/{id}', 'TestimonialController@getDeleteTestimonial')->name('admin.delete_testimonial');
//
//        // Services Page
//        Route::get('/services', 'ServiceController@getIndex')->name('admin.services');
//        Route::post('/add-service', 'ServiceController@postAddService')->name('admin.add_service');
//
//        Route::get('/update-service/{id}', 'ServiceController@getService')->name('admin.get_update_service');
//        Route::post('/update-service/{id}', 'ServiceController@postUpdateService')->name('admin.post_update_service');
//        Route::get('/delete-service/{id}', 'ServiceController@getDeleteService')->name('admin.delete_service');
//
//        // Services Features
//        Route::get('/services-features/', 'ServiceFeatureController@getIndex')->name('admin.services_features');
//        Route::post('/services-features', 'ServiceFeatureController@postAddFeature')->name('admin.post_services_features');
//        Route::get('/get-features/{id}', 'ServiceFeatureController@getUpdateFeature')->name('admin.get_update_features');
//        Route::post('/update-features/{id}', 'ServiceFeatureController@postUpdateFeature')->name('admin.post_update_features');
//        Route::get('/delete-features/{id}', 'ServiceFeatureController@getDeleteFeature')->name('admin.delete_features');
//
//        // Blog Page
//        Route::get('/blog', 'BlogController@getIndex')->name('admin.blog');
//        Route::post('/add-blog', 'BlogController@postAddBlog')->name('admin.add_blog');
//        Route::get('/update-blog/{id}', 'BlogController@getUpdateBlog')->name('admin.get_update_blog');
//        Route::post('/update-blog/{id}', 'BlogController@postUpdateBlog')->name('admin.post_update_blog');
//        Route::get('/delete-blog/{id}', 'BlogController@getDeleteBlog')->name('admin.post_delete_blog');
//
//        // Doctors Page
//        Route::get('/doctors', 'DoctorController@getIndex')->name('admin.doctors');
//        Route::post('/add-doctor', 'DoctorController@addDoctor')->name('admin.add_doctor');
//
//        Route::get('/update-doctor/{id}', 'DoctorController@getUpdateDoctor')->name('admin.get_update_doctor');
//        Route::post('/update-doctor/{id}', 'DoctorController@postUpdateDoctor')->name('admin.post_update_doctor');
//        Route::post('/add-doctor-social-link/{id}', 'DoctorController@postAddSocialLink')->name('admin.add_doctor_social_link');
//        Route::post('/update-doctor-social-link/{id}', 'DoctorController@postUpdateSocialLink')->name('admin.update_doctor_social_link');
//        Route::post('/delete-doctor-social-link/{id}', 'DoctorController@postDeleteSocialLink')->name('admin.delete_doctor_social_link');
//        Route::get('/delete-doctor/{id}', 'DoctorController@getDeleteDoctor')->name('admin.delete_doctor');
//
//        // Categories Page
//        Route::get('/categories', 'CategoriesController@getIndex')->name('admin.categories');
//        Route::post('/add-category', 'CategoriesController@postAddCategory')->name('admin.add_category');
//
//        Route::post('/update-category/{id}', 'CategoriesController@postUpdateCategory')->name('admin.update_category');
//        Route::post('/delete-category/{id}', 'CategoriesController@postDeleteCategory')->name('admin.delete_category');
//
//        // Gallery
//        Route::get('/gallery', 'GalleryController@getIndex')->name('admin.gallery');
//        Route::post('/add-gallery', 'GalleryController@postAddGallery')->name('admin.add_gallery');
//        Route::post('/update-gallery/{id}', 'GalleryController@postUpdateGallery')->name('admin.update_gallery');
//        Route::get('/delete-gallery/{id}', 'GalleryController@postDeleteGallery')->name('admin.delete_gallery');
//
//        // Contacts Page
//        Route::get('/contacts', 'ContactController@getIndex')->name('admin.contacts');
//        Route::get('/reply-message/{id}', 'ContactController@getReply')->name('admin.get_reply_message');
//        Route::post('/reply-message', 'ContactController@postReply')->name('admin.post_reply_message');
//
//        Route::post('/add-contact', 'ContactController@postAddContact')->name('admin.add_contact_info');
//        Route::get('/update-contact/{id}', 'ContactController@getUpdateContact')->name('admin.get_update_contact_info');
//        Route::post('/update-contact-info/{id}', 'ContactController@postUpdateContact')->name('admin.post_update_contact_info');
//        Route::get('/delete-contact/{id}', 'ContactController@postDeleteContact')->name('admin.delete_contact_info');
//
//        Route::get('/delete-message/{id}', 'ContactController@deleteMessage')->name('admin.post_delete_message');
//
//        // Subscribe Page
//        Route::get('/subscribe', 'SubscribeController@getIndex')->name('admin.subscribe');
//        Route::get('/reply-subscribe/{id}', 'SubscribeController@getReply')->name('admin.get_reply_subscriber');
//        Route::post('/reply-subscribe/{id}', 'SubscribeController@postReply')->name('admin.post_reply_subscriber');
//        Route::get('/delete-subscribe/{id}', 'SubscribeController@getDelete')->name('admin.get_delete_subscriber');
//
//

//    });
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

    // Meal Routes
    Route::get('/add-meal/{id}', 'MealController@getIndex')->name('site.add-meal');
    Route::post('/add-meal/{id}', 'MealController@postAddMeal')->name('site.postAddMeal');

    Route::get('/update-meal/{id}/{ch_id}', 'MealController@getUpdateMeal')->name('site.getUpdateMeal');
    Route::post('/update-meal/{id}/{ch_id}', 'MealController@postUpdateMeal')->name('site.postUpdateMeal');

    Route::post('/delete-meal/{id}/', 'MealController@deleteMeal')->name('site.deleteMeal');

    // Normal User Routes
    Route::get('/user-profile/{id}', 'UserController@getIndex')->name('site.user-profile');
    Route::get('/update-user-profile/{id}', 'UserController@getUserProfile')->name('site.get-update-user-profile');

    Route::post('/update-user-profile/{id}', 'UserController@postUserProfile')->name('site.postUpdateUser');

    // Normal User Logout Route
    Route::get('/logouta', 'UserController@getLogout')->name('site.userGetLogout');

    // Normal User Search
    Route::post('/user-search/', 'UserController@postSearch')->name('site.user_search');
    Route::get('/kitchen/{ch_id}', 'UserController@getOneKitchen')->name('site.get_one_kitchen');

    // Add To Cart Routes
    Route::get('add-to-cart/{id}/{ch_id}', 'UserController@getAddCart')->name('site.add_to_cart');


//    Route::post('/contact', 'HomeController@postSendMessage')->name('Site.send_message');
//    Route::post('/subscribe', 'HomeController@postSubscribe')->name('Site.subscribe');
//
//    // Services Page
//    Route::get('/service', 'ServiceController@getIndex')->name('Site.services');
//    Route::get('/single-service/{slug}', 'ServiceController@getSingleService')->name('Site.single_service');
//
//    // Doctors Page
//    Route::get('/doctors', 'DoctorController@getIndex')->name('Site.doctors');
//
//    // Blogs Page
//    Route::get('/blogs', 'BlogController@getIndex')->name('Site.blogs');
//    Route::get('/blogs/{slug}', 'BlogController@getBlog')->name('Site.get_blog');
//
//    // About Page
//    Route::get('/about-us', 'AboutController@getIndex')->name('Site.about');
//
//    // Gallery Page
//    Route::get('/gallery', 'GalleryController@getIndex')->name('Site.gallery');
//
//    // Gallery Page
//    Route::get('/contact', 'ContactController@getIndex')->name('Site.contact');
//
//    // Reservation Page
//    Route::get('/reserve', 'ReserveController@getIndex')->name('Site.reserve');
//    Route::post('/reserve', 'ReserveController@postReserve')->name('Site.post_reserve');
//
//
});
