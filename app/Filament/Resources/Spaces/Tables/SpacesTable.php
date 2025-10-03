<?php

namespace App\Filament\Resources\Spaces\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SpacesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->label('Название'),
                TextColumn::make('district_id')
                    ->label('Район')
                    ->sortable(),
                TextColumn::make('user_id')
                    ->label('Создатель')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('latitude')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('longitude')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('locality')
                //     ->searchable(),
                // TextColumn::make('street')
                //     ->searchable(),
                // TextColumn::make('building')
                //     ->searchable(),
                // TextColumn::make('phone')
                //     ->searchable(),
                // TextColumn::make('email')
                //     ->label('Email address')
                //     ->searchable(),
                // TextColumn::make('website')
                //     ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
