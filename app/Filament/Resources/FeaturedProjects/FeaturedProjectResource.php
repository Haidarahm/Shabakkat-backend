<?php

namespace App\Filament\Resources\FeaturedProjects;

use App\Filament\Forms\Components\MediaUpload;
use App\Filament\Resources\FeaturedProjects\Pages\CreateFeaturedProject;
use App\Filament\Resources\FeaturedProjects\Pages\EditFeaturedProject;
use App\Filament\Resources\FeaturedProjects\Pages\ListFeaturedProjects;
use App\Models\FeaturedProject;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FeaturedProjectResource extends Resource
{
    protected static ?string $model = FeaturedProject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('href')
                    ->label('Link URL')
                    ->required(),
                TextInput::make('photo_label'),
                MediaUpload::make('photo_src', 'featured-projects', 'Photo')
                    ->required()
                    ->columnSpanFull(),
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
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('href')
                    ->toggleable(),
                TextColumn::make('photo_src')
                    ->label('Photo')
                    ->toggleable(),
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
            'index' => ListFeaturedProjects::route('/'),
            'create' => CreateFeaturedProject::route('/create'),
            'edit' => EditFeaturedProject::route('/{record}/edit'),
        ];
    }
}
