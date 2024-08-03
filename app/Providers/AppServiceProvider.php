<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    private array $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
    ];

    private array $observers = [
        User::class => UserObserver::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerObservers();
        $this->registerPolicies();
    }

    public function registerPolicies(): void
    {
        foreach ($this->policies as $class => $policy) {
            Gate::policy($class, $policy);
        }
    }

    public function registerObservers(): void
    {
        foreach ($this->observers as $model => $observer) {
            $model::observe($observer);
        }
    }
}
