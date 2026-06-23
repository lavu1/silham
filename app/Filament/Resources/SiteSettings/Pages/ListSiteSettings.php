<?php

namespace App\Filament\Resources\SiteSettings\Pages;

use App\Filament\Resources\SiteSettings\SiteSettingResource;
use Database\Seeders\CmsSeeder;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Artisan;

class ListSiteSettings extends ListRecords
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('syncCmsDefaults')
                ->label('Sync CMS defaults')
                ->icon(Heroicon::ArrowPath)
                ->color('gray')
                ->action(function (): void {
                    Artisan::call('db:seed', [
                        '--class' => CmsSeeder::class,
                        '--force' => true,
                    ]);

                    Notification::make()
                        ->title('CMS defaults synced')
                        ->success()
                        ->send();
                }),
        ];
    }
}
