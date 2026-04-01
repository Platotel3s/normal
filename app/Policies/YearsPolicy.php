<?php

namespace App\Policies;

use App\Models\Tahun;
use App\Models\User;

class YearsPolicy
{
    public function viewAny(): bool
    {
        return true;
    }
    public function view(User $user, Tahun $tahun): bool
    {
        return $user->id===$tahun->user_id;
    }
    public function create(): bool
    {
        return true;
    }
    public function update(User $user, Tahun $tahun): bool
    {
        return $user->id===$tahun->user_id;
    }
    public function delete(User $user, Tahun $tahun): bool
    {
        return $user->id===$tahun->user_id;
    }
    public function restore(User $user, Tahun $tahun): bool
    {
        return $user->id===$tahun->user_id;
    }
    public function forceDelete(User $user, Tahun $tahun): bool
    {
        return $user->id===$tahun->user_id;
    }
}
