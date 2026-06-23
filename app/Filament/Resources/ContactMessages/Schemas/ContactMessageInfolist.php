<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sender')
                    ->schema([
                        TextEntry::make('first_name'),
                        TextEntry::make('last_name')
                            ->placeholder('-'),
                        TextEntry::make('email')
                            ->copyable(),
                        TextEntry::make('phone')
                            ->placeholder('-')
                            ->copyable(),
                        TextEntry::make('company')
                            ->placeholder('-'),
                        TextEntry::make('read_at')
                            ->label('Read at')
                            ->dateTime()
                            ->placeholder('Unread'),
                    ])
                    ->columns(2),

                Section::make('Message')
                    ->schema([
                        TextEntry::make('message')
                            ->columnSpanFull(),
                    ]),

                Section::make('Request')
                    ->schema([
                        TextEntry::make('ip_address')
                            ->placeholder('-')
                            ->copyable(),
                        TextEntry::make('user_agent')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}
