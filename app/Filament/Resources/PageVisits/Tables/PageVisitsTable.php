<?php

namespace App\Filament\Resources\PageVisits\Tables;

use App\Models\PageVisit;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PageVisitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_slug')
                    ->label('Page')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('path')
                    ->searchable()
                    ->limit(50)
                    ->copyable(),
                TextColumn::make('route_name')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('ip_hash')
                    ->label('IP hash')
                    ->limit(16)
                    ->copyable()
                    ->toggleable(),
                TextColumn::make('referrer')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('visited_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('page_slug')
                    ->label('Page')
                    ->options(fn (): array => PageVisit::query()
                        ->select('page_slug')
                        ->distinct()
                        ->orderBy('page_slug')
                        ->pluck('page_slug', 'page_slug')
                        ->all()),
            ])
            ->defaultSort('visited_at', 'desc')
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
