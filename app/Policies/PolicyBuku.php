<?php

namespace App\Policies;

use App\Models\Buku;
use App\Models\User;
#use Illuminate\Auth\Access\Response;

class PolicyBuku
{
    public function viewAny(): bool
    {
        return true;
    }
    public function view(User $user, Buku $buku): bool
    {
        return $user->id===$buku->user_id;
    }
    public function create(): bool
    {
        return true;
    }
    public function update(User $user, Buku $buku): bool
    {
        return $user->id===$buku->user_id;
    }
    public function delete(User $user, Buku $buku): bool
    {
        return $user->id===$buku->user_id;
    }
    public function restore(User $user, Buku $buku): bool
    {
        return $user->id===$buku->user_id;
    }
    public function forceDelete(User $user, Buku $buku): bool
    {
        return $user->id===$buku->user_id;
    }
}
