<?php

namespace App\Policies;

use App\Models\Genre;
use App\Models\User;
#use Illuminate\Auth\Access\Response;

class PolicyGenre
{
    public function viewAny(): bool
    {
        return true;
    }
    public function view(User $user, Genre $genre): bool
    {
        return $user->id===$genre->user_id;
    }
    public function create(): bool
    {
        return true;
    }
    public function update(User $user, Genre $genre): bool
    {
        return $user->id===$genre->user_id;
    }
    public function delete(User $user, Genre $genre): bool
    {
        return $user->id===$genre->user_id;
    }
    public function restore(User $user, Genre $genre): bool
    {
        return $user->id===$genre->user_id;
    }
    public function forceDelete(User $user, Genre $genre): bool
    {
        return $user->id===$genre->user_id;
    }
}
