<?php

namespace App\Filament\Resources\Spaces\Schemas;

use App\Models\District;
use Filament\Forms\Components\Repeater;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpaceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основная информация')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Название')
                            ->placeholder('Введите название места'),
                        TextEntry::make('district.title')
                            ->label('Район'),
                    ])
                    ->columns()
                    ->collapsible(),
                Section::make('Географическая информация')
                    ->schema([
                        TextEntry::make('latitude')
                            ->label('Широта')
                            ->placeholder('55.755826')
                            ->numeric(),
                        TextEntry::make('longitude')
                            ->label('Долгота')
                            ->placeholder('37.617300')
                            ->numeric(),
                        TextEntry::make('locality')
                            ->label('Населенный пункт')
                            ->placeholder('Введите населенный пункт'),
                        TextEntry::make('street')
                            ->label('Улица')
                            ->placeholder('Введите улицу'),
                        TextEntry::make('building')
                            ->label('Дом')
                            ->placeholder('Введите дом'),
                    ])
                    ->columns(2)
                    ->collapsible(),
                Section::make('Контактная информация')
                    ->schema([
                        TextEntry::make('phone')
                            ->label('Телефон')
                            ->placeholder('+7 999 999 99 99'),
                        TextEntry::make('email')
                            ->label('Email')
                            ->placeholder('Введите email'),
                        TextEntry::make('website')
                            ->label('Вебсайт')
                            ->placeholder('Введите вебсайт'),
                    ])
                    ->columns(3)
                    ->collapsible(),
                Section::make('Дополнительная информация')
                    ->schema([
                        TextEntry::make('description')
                            ->label('Описание')
                            ->placeholder('Введите описание'),
                        TextEntry::make('directions')
                            ->label('Как добраться')
                            ->placeholder('Введите какие то ориентиры или распишите маршрут, что бы было понятно как добраться'),
                    ])
                    ->collapsible(),
                Section::make('Изображения')
                    ->schema([
                        ImageEntry::make('medias.path')
                            ->label('Изображения'),
                    ])
                    ->collapsible(),
            ])
            ->columns(1);
    }
}
