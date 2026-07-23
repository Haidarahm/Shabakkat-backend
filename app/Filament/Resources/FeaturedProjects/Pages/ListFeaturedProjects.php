<?php

namespace App\Filament\Resources\FeaturedProjects\Pages;

use App\Filament\Resources\FeaturedProjects\FeaturedProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFeaturedProjects extends ListRecords
{
    protected static string $resource = FeaturedProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
