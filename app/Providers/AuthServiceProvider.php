<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\AdminUser;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        /*Gate::define('update', function(AdminUser $user, Post $post) {
            return $user->roles->containsStrict('id', 2);
        });

        Gate::before( function (AdminUser $user) {
            return $user->roles->containsStrict('id', 1);
        });*/
    }
}
