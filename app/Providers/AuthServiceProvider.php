<?php

namespace App\Providers;

use App\Event;
use App\Core;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('create-event',function($user){
            return $user->id == $user->core->admin_id;
         });
         //
 
         /*Gate::define('edit-event', function($user, Event $event){
             $user = \Auth::guard('admin')->user();
             return $user->id === $event->eventable_id;
         });*/
 
         Gate::define('show-users', function($user){
             return $user->id == $user->core->admin_id;
         });
    }
}
