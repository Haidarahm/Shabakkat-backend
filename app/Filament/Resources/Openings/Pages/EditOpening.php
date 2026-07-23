<?php

namespace App\Filament\Resources\Openings\Pages;

use App\Filament\Resources\Openings\OpeningResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOpening extends EditRecord
{
    protected static string $resource = OpeningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
