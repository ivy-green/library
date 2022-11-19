<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Blade;

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
        Gate::define('admin', function(User $user) {
            return $user->ten == 'thaomy';
        });

        Gate::define('thuthu', function(User $user) {
            return $user->ten == 'thuthu';
        });
        
        // @admin @endadmin -> authorize
        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });
    }
}
