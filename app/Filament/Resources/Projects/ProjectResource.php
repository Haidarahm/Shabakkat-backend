<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Forms\Components\MediaUpload;
use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Models\Project;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('client')
                    ->required(),
                TextInput::make('country')
                    ->required(),
                TextInput::make('year')
                    ->required(),
                TextInput::make('tag')
                    ->required(),
                Select::make('color')
                    ->options([
                        'red' => 'Red',
                        'cyan' => 'Cyan',
                        'navy' => 'Navy',
                    ])
                    ->required()
                    ->default('red'),
                Textarea::make('challenge')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                TagsInput::make('scope')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('scale'),
                Textarea::make('results')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('photo_label'),
                MediaUpload::make('photo_src', 'projects', 'Photo')
                    ->columnSpanFull(),
                TextInput::make('related_service_href')
                    ->label('Related service URL'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable()
                    ->width(50),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(40)
                    ->wrap(),
                TextColumn::make('client')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('year')
                    ->searchable(),
                TextColumn::make('tag')
                    ->badge(),
                TextColumn::make('color')
                    ->badge(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}
