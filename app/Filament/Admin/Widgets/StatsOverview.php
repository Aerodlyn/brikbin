<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Part;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Parts', Number::format(Part::all()->count()))
                ->url('/admin/parts'),
        ];
    }
}
