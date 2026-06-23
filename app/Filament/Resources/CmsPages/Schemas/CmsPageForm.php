<?php

namespace App\Filament\Resources\CmsPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CmsPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page')
                    ->schema([
                        TextInput::make('slug')
                            ->helperText('Use an existing route name such as home or about, or a simple page slug such as privacy-policy.')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('label')
                            ->maxLength(255),
                        TextInput::make('title')
                            ->maxLength(255),
                        Toggle::make('sitemap_enabled')
                            ->label('Show in sitemap')
                            ->default(true),
                    ])
                    ->columns(2),

                Section::make('Page content')
                    ->schema([
                        RichEditor::make('body_html')
                            ->label('Content')
                            ->helperText('Use this for simple editable pages. Leave blank to keep using the designed page layout.')
                            ->columnSpanFull(),
                    ]),

                Section::make('Search metadata')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255),
                        Select::make('robots')
                            ->options([
                                'index,follow' => 'Index, follow',
                                'noindex,follow' => 'No index, follow',
                                'index,nofollow' => 'Index, no follow',
                                'noindex,nofollow' => 'No index, no follow',
                            ])
                            ->default('index,follow')
                            ->required(),
                        Textarea::make('meta_description')
                            ->maxLength(500)
                            ->rows(3)
                            ->columnSpanFull(),
                        TextInput::make('meta_keywords')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('canonical_url')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Open Graph')
                    ->schema([
                        TextInput::make('og_title')
                            ->maxLength(255),
                        TextInput::make('og_description')
                            ->maxLength(255),
                        FileUpload::make('og_image')
                            ->disk('public_root')
                            ->directory('uploads/cms')
                            ->image()
                            ->visibility('public')
                            ->maxSize(4096)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
