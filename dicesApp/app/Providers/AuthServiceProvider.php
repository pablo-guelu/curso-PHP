<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\Turn;
use App\Models\User;
use App\Policies\TurnPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Turn::class => TurnPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('player-or-admin', function (User $user, $id) {
            if ($user->hasRole('admin')) {
                return true;
            } elseif ($user->id == $id) {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('admin-only', function (User $user) {
            if ($user->hasRole('admin')) {
                return true;
            } else {
                return false;
            }
        });
    }
}
