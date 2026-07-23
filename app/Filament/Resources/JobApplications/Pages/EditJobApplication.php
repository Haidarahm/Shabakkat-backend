<?php

namespace App\Filament\Resources\JobApplications\Pages;

use App\Filament\Resources\JobApplications\JobApplicationResource;
use App\Models\JobApplication;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class EditJobApplication extends EditRecord
{
    protected static string $resource = JobApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadCv')
                ->label('Download CV')
                ->icon(Heroicon::OutlinedArrowDownTray)
                ->action(function (JobApplication $record) {
                    abort_unless(
                        filled($record->cv_path) && Storage::disk('local')->exists($record->cv_path),
                        404,
                    );

                    return Storage::disk('local')->download(
                        $record->cv_path,
                        $record->cv_original_name ?: basename($record->cv_path),
                    );
                }),
            DeleteAction::make(),
        ];
    }
}
