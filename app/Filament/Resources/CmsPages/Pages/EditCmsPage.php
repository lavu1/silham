<?php

namespace App\Filament\Resources\CmsPages\Pages;

use App\Filament\Resources\CmsPages\CmsPageResource;
use App\Models\CmsFragment;
use App\Models\CmsPage;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCmsPage extends EditRecord
{
    protected static string $resource = CmsPageResource::class;

    protected ?string $bodyHtml = null;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['body_html'] = CmsFragment::getValue((string) $data['slug'], 'body_html', '');

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->bodyHtml = $data['body_html'] ?? null;
        unset($data['body_html']);

        return $data;
    }

    protected function afterSave(): void
    {
        /** @var CmsPage $record */
        $record = $this->getRecord();

        CmsFragment::query()->updateOrCreate(
            [
                'page_slug' => $record->slug,
                'fragment_key' => 'body_html',
            ],
            [
                'type' => 'html',
                'content' => $this->bodyHtml,
            ],
        );
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
