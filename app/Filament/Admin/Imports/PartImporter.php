<?php

namespace App\Filament\Admin\Imports;

use App\Models\Part;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PartImporter extends Importer
{
    protected static ?string $model = Part::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('number')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('description')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('category')
                ->relationship()
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Part
    {
        return Part::firstOrNew([
            'number' => $this->data['number'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your part import has completed and '.number_format(
                $import->successful_rows,
            ).' '.str('row')->plural($import->successful_rows).' were imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' '.number_format($failedRowsCount).' '.str('row')->plural(
                    $failedRowsCount,
                ).' failed to import.';
        }

        return $body;
    }
}
