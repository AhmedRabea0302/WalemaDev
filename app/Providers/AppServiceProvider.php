<?php

namespace App\Providers;

use App\Contact;
use App\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Setting;
use App\StaticPage;
use App\SocalLink;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot() {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
