<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Stage::class => \App\Policies\StagePolicy::class,
		 \App\Models\Combination::class => \App\Policies\CombinationPolicy::class,
		 \App\Models\Team::class => \App\Policies\TeamPolicy::class,
		 \App\Models\Category::class => \App\Policies\CategoryPolicy::class,
		 \App\Models\Internship::class => \App\Policies\InternshipPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
