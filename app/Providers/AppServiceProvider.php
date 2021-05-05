<?php

namespace App\Providers;

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
	    Schema::defaultStringLength(179);
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Stage::observe(\App\Observers\StageObserver::class);
		\App\Models\Combination::observe(\App\Observers\CombinationObserver::class);
		\App\Models\Team::observe(\App\Observers\TeamObserver::class);
		\App\Models\Category::observe(\App\Observers\CategoryObserver::class);
		\App\Models\Internship::observe(\App\Observers\InternshipObserver::class);

        //
    }
}
