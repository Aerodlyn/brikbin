<?php

namespace App\Filament\App\Resources\BinResource\Pages;

use App\Filament\App\Resources\BinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListBins extends ListRecords
{
    protected static string $resource = BinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
