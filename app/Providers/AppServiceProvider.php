<?php

namespace App\Providers;

use App\EventUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        \Schema::defaultStringLength(191);
        view()->composer('*',function ($view){
            if(\Request::route()){
                $current_route_name=\Request::route()->getName();
                $view->with('current_route_name',$current_route_name);
            }
        });

        view()->composer('*',function($view){
            if(\Auth::guard('web')->check()) {
                $cuser = \Auth::guard('web')->user();
                $view->with('cuser', $cuser);
            }
        });
        view()->composer('*',function($view){
            $count_event_user = EventUser::where('status',1)->count();
           $view->with('count_event_user',$count_event_user);
        });

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
