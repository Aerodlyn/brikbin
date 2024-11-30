<?php

namespace App\Filament\App\Widgets;

use App\Models\BinPart;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;

class Inventory extends BaseWidget
{
    protected string|int|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                BinPart::query()
                    ->whereRelation(
                        'bin',
                        'user_id',
                        '=',
                        auth()->id(),
                    ),
            )
            ->columns([
                Tables\Columns\TextColumn::make('part.description'),
                Tables\Columns\ColorColumn::make('color.rgb'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('in_use'),
            ])
            ->defaultGroup(
                Tables\Grouping\Group::make('bin.name')
                    ->titlePrefixedWithLabel(false),
            )
            ->recordUrl(
                fn(Model $record): string
                    => route(
                    'filament.app.resources.bins.edit',
                    ['record' => $record->bin_id],
                ),
            );
    }
}
