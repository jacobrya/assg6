<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Article $article): bool
    {
        if ($user->isModerator()) {
            return true;
        }

        return $user->id === $article->user_id;
    }

    public function create(User $user): bool
    {
        return $user->isUser();
    }

    public function update(User $user, Article $article): bool
    {
        if ($user->isModerator()) {
            return true;
        }

        return $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article): bool
    {
        if ($user->isModerator()) {
            return true;
        }

        return $user->id === $article->user_id;
    }
}
