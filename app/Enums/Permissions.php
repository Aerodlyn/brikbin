<?php

namespace App\Enums;

enum Permissions: string
{
    case CREATE_CATEGORIES = 'create categories';
    case DELETE_CATEGORIES = 'delete categories';
    case RESTORE_CATEGORIES = 'restore categories';
    case UPDATE_CATEGORIES = 'update categories';
    case VIEW_CATEGORIES = 'view categories';

    case CREATE_PARTS = 'create parts';
    case DELETE_PARTS = 'delete parts';
    case RESTORE_PARTS = 'restore parts';
    case UPDATE_PARTS = 'update parts';
    case VIEW_PARTS = 'view parts';

    public function label(): string
    {
        return match ($this) {
            Permissions::CREATE_CATEGORIES => 'Create Categories',
            Permissions::DELETE_CATEGORIES => 'Delete Categories',
            Permissions::RESTORE_CATEGORIES => 'Restore Categories',
            Permissions::UPDATE_CATEGORIES => 'Update Categories',
            Permissions::VIEW_CATEGORIES => 'View Categories',

            Permissions::CREATE_PARTS => 'Create Parts',
            Permissions::DELETE_PARTS => 'Delete Parts',
            Permissions::RESTORE_PARTS => 'Restore Parts',
            Permissions::UPDATE_PARTS => 'Update Parts',
            Permissions::VIEW_PARTS => 'View Parts',
        };
    }
}
