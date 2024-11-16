<?php

namespace App\Policies;

use App\Enums\Permissions;
use App\Models\Part;
use App\Models\User;

class PartPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(Permissions::VIEW_PARTS);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Part $part): bool
    {
        return $user->hasPermissionTo(Permissions::VIEW_PARTS);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(Permissions::CREATE_PARTS);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Part $part): bool
    {
        return $user->hasPermissionTo(Permissions::UPDATE_PARTS);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Part $part): bool
    {
        return $user->hasPermissionTo(Permissions::DELETE_PARTS);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Part $part): bool
    {
        return $user->hasPermissionTo(Permissions::RESTORE_PARTS);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Part $part): bool
    {
        return $user->hasPermissionTo(Permissions::DELETE_PARTS);
    }
}
