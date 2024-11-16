<?php

namespace App\Filament\Admin\Imports;

use App\Models\Color;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ColorImporter extends Importer
{
    protected static ?string $model = Color::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('id')
                ->label('ID')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('rgb')
                ->label(__('RGB')),
            ImportColumn::make('type')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Color
    {
        return Color::firstOrNew([
            'id' => $this->data['id'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your color import has completed and '.number_format(
                $import->successful_rows,
            ).' '.str('row')->plural($import->successful_rows).' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' '.number_format($failedRowsCount).' '.str('row')->plural(
                    $failedRowsCount,
                ).' failed to import.';
        }

        return $body;
    }
}
