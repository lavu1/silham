<?php

namespace App\Filament\Resources\CmsFragments\Pages;

use App\Filament\Resources\CmsFragments\CmsFragmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCmsFragment extends EditRecord
{
    protected static string $resource = CmsFragmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
