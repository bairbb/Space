<?php

namespace App\Filament\Resources\Districts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\ViewField;
use Filament\Tables\Columns\ImageColumn;

class DistrictForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->label('Название'),
                RichEditor::make('description')
                    ->label('Описание'),
                ImageEntry::make('media.path')
                    ->label('Изображение')
                    ->hiddenOn('create'),
                FileUpload::make('media')
                    ->label('Изображение')
                    ->image()
                    ->directory('images/districts/'),
            ])
            ->columns(1);
    }
}
