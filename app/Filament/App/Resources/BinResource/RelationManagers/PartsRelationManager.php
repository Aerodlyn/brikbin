<?php

namespace App\Filament\App\Resources\BinResource\RelationManagers;

use App\Models\Color;
use App\Models\Part;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PartsRelationManager extends RelationManager
{
    protected static string $relationship = 'parts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('part_id')
                    ->label(__('Part'))
                    ->options(Part::all()->pluck('description', 'id'))
                    ->searchable(),
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('part.description')
            ->columns([
                Tables\Columns\TextColumn::make('part.description'),
                Tables\Columns\ColorColumn::make('color.rgb'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('in_use'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label(__('New part'))
                    ->modalHeading(__('New part')),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading(__('Edit part')),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(__('Delete part')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->modalHeading(__('Delete selected parts')),
                ]),
            ])
            ->allowDuplicates();
    }
}
