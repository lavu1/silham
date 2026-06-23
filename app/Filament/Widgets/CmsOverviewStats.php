<?php

namespace App\Filament\Widgets;

use App\Models\CmsPage;
use App\Models\ContactMessage;
use App\Models\PageVisit;
use App\Models\SiteSetting;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CmsOverviewStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('CMS pages', number_format(CmsPage::query()->count())),
            Stat::make('Site settings', number_format(SiteSetting::query()->count())),
            Stat::make('Unread messages', number_format(ContactMessage::query()->whereNull('read_at')->count()))
                ->color('warning'),
            Stat::make('Visits today', number_format(PageVisit::query()->whereDate('visited_at', today())->count())),
        ];
    }
}
