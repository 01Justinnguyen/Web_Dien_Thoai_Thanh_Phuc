<?php

namespace App\Providers;

use App\Models\brand;
use App\Models\categories;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        $category = categories::where('is_view', 1)->get();
        $brand = brand::where('is_view', 1)->get();
        view()->share('category', $category);
        view()->share('brand', $brand);


    }
}
