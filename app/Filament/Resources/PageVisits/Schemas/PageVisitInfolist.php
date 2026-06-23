<?php

namespace App\Filament\Resources\PageVisits\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageVisitInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Visit')
                    ->schema([
                        TextEntry::make('page_slug')
                            ->copyable(),
                        TextEntry::make('path')
                            ->copyable(),
                        TextEntry::make('route_name')
                            ->placeholder('-')
                            ->copyable(),
                        TextEntry::make('ip_hash')
                            ->placeholder('-')
                            ->copyable(),
                        TextEntry::make('referrer')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('user_agent')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('visited_at')
                            ->dateTime(),
                        TextEntry::make('created_at')
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}
