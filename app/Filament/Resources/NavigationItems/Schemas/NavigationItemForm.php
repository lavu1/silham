<?php

namespace App\Filament\Resources\NavigationItems\Schemas;

use App\Models\NavigationItem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Route;

class NavigationItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Menu item')
                    ->schema([
                        TextInput::make('label')
                            ->required()
                            ->maxLength(255),
                        Select::make('parent_id')
                            ->label('Parent menu')
                            ->options(fn (): array => NavigationItem::query()
                                ->whereNull('parent_id')
                                ->orderBy('sort_order')
                                ->orderBy('label')
                                ->pluck('label', 'id')
                                ->all())
                            ->searchable()
                            ->placeholder('Top-level menu item'),
                        Select::make('route_name')
                            ->label('Existing website page')
                            ->options(fn (): array => collect(Route::getRoutes()->getRoutes())
                                ->mapWithKeys(fn ($route): array => $route->getName()
                                    ? [$route->getName() => $route->getName()]
                                    : [])
                                ->reject(fn (string $name): bool => str_starts_with($name, 'admin.') || str_starts_with($name, 'filament.'))
                                ->sort()
                                ->all())
                            ->searchable()
                            ->placeholder('Choose a page or use custom link below'),
                        TextInput::make('url')
                            ->label('Custom link')
                            ->helperText('Use this only when the item should link outside the listed website pages.')
                            ->maxLength(255),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Visible')
                            ->default(true),
                        Toggle::make('opens_new_tab')
                            ->label('Open in new tab')
                            ->default(false),
                    ])
                    ->columns(2),
            ]);
    }
}
