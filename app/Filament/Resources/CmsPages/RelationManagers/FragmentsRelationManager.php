<?php

namespace App\Filament\Resources\CmsPages\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FragmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'fragments';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fragment_key')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Image',
                    ])
                    ->default('text')
                    ->live()
                    ->required(),
                Textarea::make('content')
                    ->rows(8)
                    ->visible(fn (Get $get): bool => $get('type') !== 'image')
                    ->dehydrated(fn (Get $get): bool => $get('type') !== 'image')
                    ->columnSpanFull(),
                FileUpload::make('content')
                    ->disk('public_root')
                    ->directory('uploads/cms')
                    ->image()
                    ->visibility('public')
                    ->maxSize(8192)
                    ->visible(fn (Get $get): bool => $get('type') === 'image')
                    ->dehydrated(fn (Get $get): bool => $get('type') === 'image')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('fragment_key')
            ->columns([
                TextColumn::make('fragment_key')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->badge()
                    ->sortable(),
                TextColumn::make('content')
                    ->limit(80)
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
