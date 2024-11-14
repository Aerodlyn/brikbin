<?php

namespace App\Filament\Widgets;

use App\Models\Part;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Parts', Part::all()->count())
                ->url('/parts'),
        ];
    }
}
