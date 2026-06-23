<?php

namespace App\Filament\Resources\CmsFragments\Schemas;

use App\Models\CmsPage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class CmsFragmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Fragment')
                    ->schema([
                        Select::make('page_slug')
                            ->label('Page')
                            ->options(fn (): array => CmsPage::query()
                                ->orderBy('label')
                                ->orderBy('slug')
                                ->get()
                                ->mapWithKeys(fn (CmsPage $page): array => [
                                    $page->slug => ($page->label ?: $page->slug)." ({$page->slug})",
                                ])
                                ->all())
                            ->searchable()
                            ->required(),
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
                    ])
                    ->columns(2),
            ]);
    }
}
