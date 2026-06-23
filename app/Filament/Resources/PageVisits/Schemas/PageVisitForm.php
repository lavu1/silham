<?php

namespace App\Filament\Resources\PageVisits\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageVisitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Visit')
                    ->schema([
                        TextInput::make('page_slug')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('path')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('route_name')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('ip_hash')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('referrer')
                            ->disabled()
                            ->dehydrated(false),
                        DateTimePicker::make('visited_at')
                            ->disabled()
                            ->dehydrated(false),
                        Textarea::make('user_agent')
                            ->disabled()
                            ->dehydrated(false)
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
