<?php

namespace App\Filament\Admin\Resources\ColorResource\Pages;

use App\Filament\Admin\Imports\ColorImporter;
use App\Filament\Admin\Resources\ColorResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Validation\Rules\File;

class ManageColors extends ManageRecords
{
    protected static string $resource = ColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            ImportAction::make()
                ->importer(ColorImporter::class)
                ->csvDelimiter(';')
                ->fileRules([
                    File::types(['csv', 'txt']),
                ]),
        ];
    }
}
