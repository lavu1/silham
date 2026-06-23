<?php

namespace App\Filament\Resources\NewsEvents\Pages;

use App\Filament\Resources\NewsEvents\NewsEventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsEvent extends CreateRecord
{
    protected static string $resource = NewsEventResource::class;
}
