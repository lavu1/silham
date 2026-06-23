<?php

namespace App\Filament\Resources\CmsPages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CmsPagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                TextColumn::make('meta_title')
                    ->label('Meta title')
                    ->limit(45)
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('robots')
                    ->badge()
                    ->sortable()
                    ->toggleable(),
                IconColumn::make('sitemap_enabled')
                    ->label('Sitemap')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('fragments_count')
                    ->label('Fragments')
                    ->counts('fragments')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('robots')
                    ->options([
                        'index,follow' => 'Index, follow',
                        'noindex,follow' => 'No index, follow',
                        'index,nofollow' => 'Index, no follow',
                        'noindex,nofollow' => 'No index, no follow',
                    ]),
            ])
            ->defaultSort('slug')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
