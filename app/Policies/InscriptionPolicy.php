<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Inscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscriptionPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Inscription $inscription)
    {
        return $user->username === "admin";
    }
}
