<?php

namespace App\Filament\Resources\NewsEvents\Pages;

use App\Filament\Resources\NewsEvents\NewsEventResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditNewsEvent extends EditRecord
{
    protected static string $resource = NewsEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
