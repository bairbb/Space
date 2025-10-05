<?php

namespace App\Filament\Resources\Spaces\Schemas;

use App\Models\District;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpaceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основная информация')
                    ->schema([
                        Hidden::make('user_id')
                            ->default(auth()->id()),
                        TextInput::make('title')
                            ->label('Название')
                            ->placeholder('Введите название места')
                            ->required(),
                        Select::make('district_id')
                            ->label('Район')
                            ->placeholder('Выберите район')
                            ->options(District::all()->pluck('title', 'id'))
                            ->required(),
                    ])
                    ->columns(2)
                    ->collapsible(),
                Section::make('Контактная информация')
                    ->schema([
                        TextInput::make('phone')
                            ->label('Телефон')
                            ->tel()
                            ->mask('+7 999 999 99 99')
                            ->placeholder('+7 999 999 99 99'),
                        TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Введите email')
                            ->email(),
                        TextInput::make('website')
                            ->label('Вебсайт')
                            ->placeholder('Введите вебсайт')
                            ->url(),
                    ])
                    ->columns(3)
                    ->collapsible(),
                Section::make('Географическая информация')
                    ->schema([
                        TextInput::make('latitude')
                            ->label('Широта')
                            ->mask('99.99999999')
                            ->placeholder('55.755826')
                            ->numeric()
                            ->regex('/^-?([1-8]?[0-9](\.\d{1,8})?|90(\.0{1,8})?)$/')
                            ->minValue(-90)
                            ->maxValue(90)
                            ->validationMessages([
                                'regex' => 'Неверный формат широты.',
                                'min' => 'Широта должна быть не менее -90 градусов',
                                'max' => 'Широта должна быть не более 90 градусов',
                            ]),
                        TextInput::make('longitude')
                            ->label('Долгота')
                            ->mask('999.99999999')
                            ->placeholder('37.617300')
                            ->numeric()
                            ->regex('/^-?((1[0-7]|[1-9])?[0-9](\.\d{1,8})?|180(\.0{1,8})?)$/')
                            ->minValue(-180)
                            ->maxValue(180)
                            ->validationMessages([
                                'regex' => 'Неверный формат долготы.',
                                'min' => 'Долгота должна быть не менее -180 градусов',
                                'max' => 'Долгота должна быть не более 180 градусов',
                            ]),
                        TextInput::make('locality')
                            ->label('Населенный пункт')
                            ->placeholder('Введите населенный пункт'),
                        TextInput::make('street')
                            ->label('Улица')
                            ->placeholder('Введите улицу'),
                        TextInput::make('building')
                            ->label('Дом')
                            ->placeholder('Введите дом'),
                    ])
                    ->columns(2)
                    ->collapsible(),
                Section::make('Дополнительная информация')
                    ->schema([
                        RichEditor::make('description')
                            ->label('Описание')
                            ->placeholder('Введите описание'),
                        RichEditor::make('directions')
                            ->label('Как добраться')
                            ->placeholder('Введите какие то ориентиры или распишите маршрут, что бы было понятно как добраться'),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ])
            ->columns(1);
    }
}
