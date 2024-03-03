<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate for actions that require being an owner (full CRUD operations)
        Gate::define('isOwner', function ($user) {
            return $user->role === 'owner';
        });

        // Gate for actions that Managers and Owners can perform (update and soft delete)
        Gate::define('canManage', function ($user) {
            return in_array($user->role, ['owner', 'manager']);
        });

        // Gate for any authenticated user to view records
        Gate::define('canView', function ($user) {
            return true; // All authenticated users can view records
        });
    }
}
