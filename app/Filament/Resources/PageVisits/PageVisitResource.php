<?php

namespace App\Filament\Resources\PageVisits;

use App\Filament\Resources\PageVisits\Pages\ListPageVisits;
use App\Filament\Resources\PageVisits\Pages\ViewPageVisit;
use App\Filament\Resources\PageVisits\Schemas\PageVisitForm;
use App\Filament\Resources\PageVisits\Schemas\PageVisitInfolist;
use App\Filament\Resources\PageVisits\Tables\PageVisitsTable;
use App\Models\PageVisit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class PageVisitResource extends Resource
{
    protected static ?string $model = PageVisit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static string|UnitEnum|null $navigationGroup = 'Analytics';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'page visit';

    protected static ?string $pluralModelLabel = 'page visits';

    protected static ?string $recordTitleAttribute = 'path';

    public static function form(Schema $schema): Schema
    {
        return PageVisitForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PageVisitInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageVisitsTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPageVisits::route('/'),
            'view' => ViewPageVisit::route('/{record}'),
        ];
    }
}
