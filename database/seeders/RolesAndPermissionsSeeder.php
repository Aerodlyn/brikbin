<?php

namespace Database\Seeders;

use App\Enums\Permissions;
use App\Enums\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => Permissions::CREATE_BINS->value]);
        Permission::create(['name' => Permissions::DELETE_BINS->value]);
        Permission::create(['name' => Permissions::RESTORE_BINS->value]);
        Permission::create(['name' => Permissions::UPDATE_BINS->value]);
        Permission::create(['name' => Permissions::VIEW_BINS->value]);

        Permission::create(['name' => Permissions::CREATE_CATEGORIES->value]);
        Permission::create(['name' => Permissions::DELETE_CATEGORIES->value]);
        Permission::create(['name' => Permissions::RESTORE_CATEGORIES->value]);
        Permission::create(['name' => Permissions::UPDATE_CATEGORIES->value]);
        Permission::create(['name' => Permissions::VIEW_CATEGORIES->value]);

        Permission::create(['name' => Permissions::CREATE_COLORS->value]);
        Permission::create(['name' => Permissions::DELETE_COLORS->value]);
        Permission::create(['name' => Permissions::RESTORE_COLORS->value]);
        Permission::create(['name' => Permissions::UPDATE_COLORS->value]);
        Permission::create(['name' => Permissions::VIEW_COLORS->value]);

        Permission::create(['name' => Permissions::CREATE_PARTS->value]);
        Permission::create(['name' => Permissions::DELETE_PARTS->value]);
        Permission::create(['name' => Permissions::RESTORE_PARTS->value]);
        Permission::create(['name' => Permissions::UPDATE_PARTS->value]);
        Permission::create(['name' => Permissions::VIEW_PARTS->value]);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => Roles::ADMIN->value])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => Roles::USER->value])
            ->givePermissionTo(
                Permissions::CREATE_BINS,
                Permissions::DELETE_BINS,
                Permissions::RESTORE_BINS,
                Permissions::UPDATE_BINS,
                Permissions::VIEW_BINS,
                Permissions::VIEW_CATEGORIES,
                Permissions::VIEW_COLORS,
                Permissions::VIEW_PARTS,
            );
    }
}
