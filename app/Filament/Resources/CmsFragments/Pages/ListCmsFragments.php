<?php

namespace App\Filament\Resources\CmsFragments\Pages;

use App\Filament\Resources\CmsFragments\CmsFragmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCmsFragments extends ListRecords
{
    protected static string $resource = CmsFragmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
