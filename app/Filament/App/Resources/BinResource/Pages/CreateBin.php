<?php

namespace App\Filament\App\Resources\BinResource\Pages;

use App\Filament\App\Resources\BinResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateBin extends CreateRecord
{
    protected static string $resource = BinResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return static::getModel()::create(
            array_merge($data, ['user_id' => auth()->id()]),
        );
    }
}
