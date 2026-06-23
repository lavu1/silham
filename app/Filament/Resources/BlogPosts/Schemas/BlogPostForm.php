<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->helperText('Leave blank to generate from the title.')
                            ->maxLength(255),
                        TextInput::make('category')
                            ->maxLength(255),
                        TextInput::make('author')
                            ->default('Silham')
                            ->maxLength(255),
                        DatePicker::make('published_at')
                            ->label('Publish date')
                            ->native(false),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        FileUpload::make('image')
                            ->label('Featured image')
                            ->disk('public_root')
                            ->directory('uploads/blog')
                            ->image()
                            ->visibility('public')
                            ->maxSize(8192)
                            ->columnSpanFull(),
                        Textarea::make('excerpt')
                            ->rows(3)
                            ->columnSpanFull(),
                        RichEditor::make('body')
                            ->label('Story content')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Search preview')
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
