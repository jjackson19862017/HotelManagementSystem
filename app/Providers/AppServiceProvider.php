<?php

namespace App\Providers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share('deletedUsers',User::onlyTrashed()->count()); // Counts Deleted Users and returns the result in the dashboard.
        View::share('deletedHotels',Hotel::onlyTrashed()->count()); // Counts Deleted Hotels and returns the result in the dashboard.
    }
}
