<?php

namespace App\Filament\Admin\Imports;

use App\Models\Category;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CategoryImporter extends Importer
{
    protected static ?string $model = Category::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('id')
                ->label('ID')
                ->requiredMapping()
                ->rules(['required'])
                ->guess(['category_id', 'category id']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->guess(['category_name', 'category name']),
        ];
    }

    public function resolveRecord(): ?Category
    {
        return Category::firstOrNew([
            'id' => $this->data['id'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your category import has completed and '.number_format(
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
