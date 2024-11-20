<?php

namespace App\Observers;

use App\Enums\Roles;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        $user->assignRole(Roles::USER);
    }
}
