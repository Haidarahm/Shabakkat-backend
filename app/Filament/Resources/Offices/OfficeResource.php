<?php

namespace App\Filament\Resources\Offices;

use App\Filament\Forms\Components\MediaUpload;
use App\Filament\Resources\Offices\Pages\CreateOffice;
use App\Filament\Resources\Offices\Pages\EditOffice;
use App\Filament\Resources\Offices\Pages\ListOffices;
use App\Models\Office;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class OfficeResource extends Resource
{
    protected static ?string $model = Office::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static string|UnitEnum|null $navigationGroup = 'Company';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull(),
                Select::make('role')
                    ->options([
                        'Headquarters' => 'Headquarters',
                        'Regional office' => 'Regional office',
                        'Project delivery' => 'Project delivery',
                    ]),
                Select::make('color')
                    ->options([
                        'red' => 'Red',
                        'cyan' => 'Cyan',
                    ]),
                Textarea::make('address')
                    ->rows(2)
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->tel(),
                MediaUpload::make('photo_src', 'offices', 'Photo')
                    ->columnSpanFull(),
                Toggle::make('is_headquarters')
                    ->label('Headquarters'),
                TextInput::make('map_cx')
                    ->label('Map X')
                    ->numeric(),
                TextInput::make('map_cy')
                    ->label('Map Y')
                    ->numeric(),
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
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('role')
                    ->badge(),
                IconColumn::make('is_headquarters')
                    ->label('HQ')
                    ->boolean(),
                TextColumn::make('phone')
                    ->toggleable(),
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
            'index' => ListOffices::route('/'),
            'create' => CreateOffice::route('/create'),
            'edit' => EditOffice::route('/{record}/edit'),
        ];
    }
}
