<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sender')
                    ->schema([
                        TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('last_name')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('company')
                            ->maxLength(255),
                        DateTimePicker::make('read_at')
                            ->label('Read at'),
                    ])
                    ->columns(2),

                Section::make('Message')
                    ->schema([
                        Textarea::make('message')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                    ]),

                Section::make('Request')
                    ->schema([
                        TextInput::make('ip_address')
                            ->disabled()
                            ->dehydrated(false),
                        Textarea::make('user_agent')
                            ->disabled()
                            ->dehydrated(false)
                            ->rows(3),
                    ])
                    ->columns(2),
            ]);
    }
}
