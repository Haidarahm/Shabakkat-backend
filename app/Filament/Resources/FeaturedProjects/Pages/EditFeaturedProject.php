<?php

namespace App\Filament\Resources\FeaturedProjects\Pages;

use App\Filament\Resources\FeaturedProjects\FeaturedProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFeaturedProject extends EditRecord
{
    protected static string $resource = FeaturedProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
