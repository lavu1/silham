<?php

namespace App\Filament\Resources\NewsEvents\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NewsEventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Story')
                    ->schema([
                        Select::make('type')
                            ->options([
                                'event' => 'Event',
                                'news' => 'News story',
                            ])
                            ->default('news')
                            ->required(),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->helperText('Leave blank to generate from the title.')
                            ->maxLength(255),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        FileUpload::make('image')
                            ->label('Featured image')
                            ->disk('public_root')
                            ->directory('uploads/events')
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

                Section::make('Event details')
                    ->schema([
                        DatePicker::make('starts_at')
                            ->label('Start date')
                            ->native(false),
                        DatePicker::make('ends_at')
                            ->label('End date')
                            ->native(false),
                        TextInput::make('time_text')
                            ->label('Time')
                            ->maxLength(255),
                        TextInput::make('location')
                            ->maxLength(255),
                        TextInput::make('price')
                            ->maxLength(255),
                        TextInput::make('registration_url')
                            ->label('Registration link')
                            ->url()
                            ->maxLength(255)
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
