<?php

namespace App\Filament\Resources\Openings;

use App\Filament\Resources\Openings\Pages\CreateOpening;
use App\Filament\Resources\Openings\Pages\EditOpening;
use App\Filament\Resources\Openings\Pages\ListOpenings;
use App\Models\Opening;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class OpeningResource extends Resource
{
    protected static ?string $model = Opening::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserPlus;

    protected static string|UnitEnum|null $navigationGroup = 'Careers';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Job openings';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('department')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                TextInput::make('type')
                    ->required()
                    ->default('Full-time'),
                Toggle::make('is_active')
                    ->label('Active / published')
                    ->default(true),
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
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('department')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->sortable(),
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
            'index' => ListOpenings::route('/'),
            'create' => CreateOpening::route('/create'),
            'edit' => EditOpening::route('/{record}/edit'),
        ];
    }
}
