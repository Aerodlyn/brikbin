<?php

namespace App\Filament\App\Resources\BinResource\RelationManagers;

use App\Models\Color;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Table;

class PartsRelationManager extends RelationManager
{
    protected static string $relationship = 'parts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('color_id')
                    ->label(__('Color'))
                    ->options(Color::all()->pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\ColorColumn::make('colors.rgb')
                    ->label(__('Color')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                AttachAction::make()
                    ->form(fn(AttachAction $action): array
                        => [
                        $action->getRecordSelect(),
                        Forms\Components\Select::make('color_id')
                            ->label(__('Color'))
                            ->options(Color::all()->pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\TextInput::make('quantity')
                            ->numeric()
                            ->step(1)
                            ->default(0),
                        Forms\Components\TextInput::make('in_use')
                            ->numeric()
                            ->step(1)
                            ->default(0),
                    ],
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ])
            ->allowDuplicates();
    }
}
