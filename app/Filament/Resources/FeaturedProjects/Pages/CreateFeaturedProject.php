<?php

namespace App\Filament\Resources\FeaturedProjects\Pages;

use App\Filament\Resources\FeaturedProjects\FeaturedProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFeaturedProject extends CreateRecord
{
    protected static string $resource = FeaturedProjectResource::class;
}
