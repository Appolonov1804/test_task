<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;

class PostPolicy
{
    use HandlesAuthorization;


   public function edit(User $user, Post $post)
    {
        return $user->id === $post->users_id;
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->users_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->users_id;
    }
}
