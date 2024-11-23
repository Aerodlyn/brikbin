<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Bin;
use App\Models\Category;
use App\Models\Color;
use App\Models\Part;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Bins', Number::format(Bin::all()->count()))
                ->url('/admin/bins'),
            Stat::make('Categories', Number::format(Category::all()->count()))
                ->url('/admin/categories'),
            Stat::make('Colors', Number::format(Color::all()->count()))
                ->url('/admin/colors'),
            Stat::make('Parts', Number::format(Part::all()->count()))
                ->url('/admin/parts'),
            Stat::make('Users', Number::format(User::all()->count()))
                ->url('/admin/users'),
        ];
    }
}
