<?php

namespace App\Filament\Resources\CmsPages\Pages;

use App\Filament\Resources\CmsPages\CmsPageResource;
use App\Models\CmsFragment;
use Filament\Resources\Pages\CreateRecord;

class CreateCmsPage extends CreateRecord
{
    protected static string $resource = CmsPageResource::class;

    protected ?string $bodyHtml = null;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->bodyHtml = $data['body_html'] ?? null;
        unset($data['body_html']);

        return $data;
    }

    protected function afterCreate(): void
    {
        CmsFragment::query()->updateOrCreate(
            [
                'page_slug' => $this->getRecord()->slug,
                'fragment_key' => 'body_html',
            ],
            [
                'type' => 'html',
                'content' => $this->bodyHtml,
            ],
        );
    }
}
