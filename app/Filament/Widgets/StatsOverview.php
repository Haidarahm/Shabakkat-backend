<?php

namespace App\Filament\Widgets;

use App\Models\ContactSubmission;
use App\Models\Industry;
use App\Models\Opening;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::count())
                ->description('Case studies published')
                ->icon('heroicon-o-briefcase'),
            Stat::make('Services', Service::count())
                ->description('Service detail blocks')
                ->icon('heroicon-o-wrench-screwdriver'),
            Stat::make('Partner logos', Partner::count())
                ->description('Logo strip entries')
                ->icon('heroicon-o-photo'),
            Stat::make('Industries', Industry::count())
                ->description('Markets we serve')
                ->icon('heroicon-o-building-office-2'),
            Stat::make('New inquiries', ContactSubmission::where('status', 'new')->count())
                ->description('Awaiting review')
                ->icon('heroicon-o-inbox')
                ->color('danger'),
            Stat::make('Open roles', Opening::where('is_active', true)->count())
                ->description('Active job openings')
                ->icon('heroicon-o-user-plus'),
        ];
    }
}
