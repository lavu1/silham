<?php

namespace App\Filament\Resources\CmsFragments;

use App\Filament\Resources\CmsFragments\Pages\CreateCmsFragment;
use App\Filament\Resources\CmsFragments\Pages\EditCmsFragment;
use App\Filament\Resources\CmsFragments\Pages\ListCmsFragments;
use App\Filament\Resources\CmsFragments\Schemas\CmsFragmentForm;
use App\Filament\Resources\CmsFragments\Tables\CmsFragmentsTable;
use App\Models\CmsFragment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CmsFragmentResource extends Resource
{
    protected static ?string $model = CmsFragment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCodeBracketSquare;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'CMS fragment';

    protected static ?string $pluralModelLabel = 'CMS fragments';

    protected static ?string $recordTitleAttribute = 'fragment_key';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function canViewAny(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return CmsFragmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CmsFragmentsTable::configure($table);
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
            'index' => ListCmsFragments::route('/'),
            'create' => CreateCmsFragment::route('/create'),
            'edit' => EditCmsFragment::route('/{record}/edit'),
        ];
    }
}
