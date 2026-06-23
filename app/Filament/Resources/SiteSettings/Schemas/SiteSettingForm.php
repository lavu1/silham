<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Setting')
                    ->schema([
                        TextInput::make('key')
                            ->required()
                            ->unique()
                            ->maxLength(255),
                        Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'image' => 'Image',
                            ])
                            ->default('text')
                            ->live()
                            ->required(),

                        TextInput::make('value')
                            ->visible(fn (Get $get): bool => ! in_array($get('type'), ['textarea', 'image'], true))
                            ->dehydrated(fn (Get $get): bool => ! in_array($get('type'), ['textarea', 'image'], true))
                            ->columnSpanFull(),
                        Textarea::make('value')
                            ->rows(8)
                            ->visible(fn (Get $get): bool => $get('type') === 'textarea')
                            ->dehydrated(fn (Get $get): bool => $get('type') === 'textarea')
                            ->columnSpanFull(),
                        FileUpload::make('value')
                            ->disk('public_root')
                            ->directory('uploads/cms')
                            ->image()
                            ->visibility('public')
                            ->maxSize(4096)
                            ->visible(fn (Get $get): bool => $get('type') === 'image')
                            ->dehydrated(fn (Get $get): bool => $get('type') === 'image')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
