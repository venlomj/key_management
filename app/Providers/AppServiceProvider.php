<?php

namespace App\Providers;

use App\Listeners\NewMicrosoft365SignInListener;
use Dcblogdev\MsGraph\Events\NewMicrosoft365SignInEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        Gate::define('admin-access', function (User $user) {
//            return $user->is_admin;
//        });

        // only grant access to users of that specific school
//        Gate::define('school-access', function (User $user, Institution $school) {
//            return Gate::allows('admin-access') || $user->schoolId === $school->schoolId;
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            NewMicrosoft365SignInEvent::class,
            [NewMicrosoft365SignInListener::class, 'handle']
        );
    }
}
