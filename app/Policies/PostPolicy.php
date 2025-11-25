<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\AdminUser;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(AdminUser $user): bool
    {
        return $user->roles->containsStrict('id', 1);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(AdminUser $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(AdminUser $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(AdminUser $user, Post $post)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(AdminUser $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(AdminUser $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(AdminUser $user, Post $post): bool
    {
        return true;
    }
}
