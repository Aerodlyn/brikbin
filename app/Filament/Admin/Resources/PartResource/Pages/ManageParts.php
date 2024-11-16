<?php

namespace App\Filament\Admin\Resources\PartResource\Pages;

use App\Filament\Admin\Imports\PartImporter;
use App\Filament\Admin\Resources\PartResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Validation\Rules\File;

class ManageParts extends ManageRecords
{
    protected static string $resource = PartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\ImportAction::make()
                ->importer(PartImporter::class)
                ->csvDelimiter(';')
                ->fileRules([
                    File::types(['csv', 'txt'])
                ]),
        ];
    }
}
