<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
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
        Model::unguard();

        // Define admin role for higher permissions
        Gate::define('admin', function (User $user){
            return $user->admin_level == 'admin';
        });

        //Blade directive to check the Gate directive above for admin user
        Blade::if('admin', function (){
            return request()->user()->can('admin');
        });

        // Define User role for posting
        Gate::define('user', function (User $user){
            return $user->admin_level == 'user';
        });

        Blade::if('user', function (){
            return request()->user()->can('user');
        });
    }
}
