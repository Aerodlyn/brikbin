<?php

namespace App\Policies;

use App\Enums\Permissions;
use App\Models\Bin;
use App\Models\User;

class BinPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(Permissions::VIEW_BINS);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Bin $bin): bool
    {
        return $user->hasPermissionTo(Permissions::VIEW_BINS)
            && $this->isBinOwned($user, $bin);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(Permissions::CREATE_BINS);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bin $bin): bool
    {
        return $user->hasPermissionTo(Permissions::UPDATE_BINS)
            && $this->isBinOwned($user, $bin);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Bin $bin): bool
    {
        return $user->hasPermissionTo(Permissions::DELETE_BINS)
            && $this->isBinOwned($user, $bin);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Bin $bin): bool
    {
        return $user->hasPermissionTo(Permissions::RESTORE_BINS)
            && $this->isBinOwned($user, $bin);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Bin $bin): bool
    {
        return $user->hasPermissionTo(Permissions::DELETE_BINS)
            && $this->isBinOwned($user, $bin);
    }

    private function isBinOwned(User $user, Bin $bin): bool
    {
        return $user->id === $bin->user->id;
    }
}
