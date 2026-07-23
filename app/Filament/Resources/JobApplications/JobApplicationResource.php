<?php

namespace App\Filament\Resources\JobApplications;

use App\Filament\Resources\JobApplications\Pages\EditJobApplication;
use App\Filament\Resources\JobApplications\Pages\ListJobApplications;
use App\Models\JobApplication;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class JobApplicationResource extends Resource
{
    protected static ?string $model = JobApplication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup = 'Careers';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Applications';

    protected static ?string $modelLabel = 'job application';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('opening_title')
                    ->label('Position')
                    ->disabled()
                    ->placeholder('General application'),
                TextInput::make('name')
                    ->disabled(),
                TextInput::make('email')
                    ->label('Email')
                    ->disabled(),
                TextInput::make('phone')
                    ->disabled(),
                TextInput::make('linkedin')
                    ->label('LinkedIn')
                    ->disabled(),
                TextInput::make('portfolio')
                    ->disabled(),
                Textarea::make('cover_letter')
                    ->label('Cover letter')
                    ->disabled()
                    ->rows(5)
                    ->columnSpanFull(),
                TextInput::make('cv_original_name')
                    ->label('CV filename')
                    ->disabled(),
                TextInput::make('ip_address')
                    ->disabled(),
                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'reviewed' => 'Reviewed',
                        'shortlisted' => 'Shortlisted',
                        'rejected' => 'Rejected',
                        'archived' => 'Archived',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('opening_title')
                    ->label('Position')
                    ->placeholder('General')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'danger',
                        'reviewed' => 'warning',
                        'shortlisted' => 'success',
                        'rejected' => 'gray',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'reviewed' => 'Reviewed',
                        'shortlisted' => 'Shortlisted',
                        'rejected' => 'Rejected',
                        'archived' => 'Archived',
                    ]),
                SelectFilter::make('opening_id')
                    ->label('Opening')
                    ->relationship('opening', 'title'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->label('Update status'),
                Action::make('downloadCv')
                    ->label('CV')
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobApplications::route('/'),
            'edit' => EditJobApplication::route('/{record}/edit'),
        ];
    }
}
