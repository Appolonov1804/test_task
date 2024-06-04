<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Comment $comment)
    {
        return $user->id === $comment->users_id;
    }

    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->users_id;
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->users_id;
    }
}
