<?php

namespace App\Filament\Resources\PageSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PageSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->searchable(),
                TextColumn::make('meta_description')
                    ->label('Meta Description')
                    ->searchable(),
                TextColumn::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->searchable(),
                TextColumn::make('meta_key')
                    ->label('Meta Key')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
