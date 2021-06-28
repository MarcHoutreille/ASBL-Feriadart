<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Guest;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuestPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Guest $guest)
    {
        return $user->username === "admin";
    }
}
