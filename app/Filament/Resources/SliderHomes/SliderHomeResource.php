<?php

namespace App\Filament\Resources\SliderHomes;

use App\Filament\Resources\SliderHomes\Pages\CreateSliderHome;
use App\Filament\Resources\SliderHomes\Pages\EditSliderHome;
use App\Filament\Resources\SliderHomes\Pages\ListSliderHomes;
use App\Filament\Resources\SliderHomes\Schemas\SliderHomeForm;
use App\Filament\Resources\SliderHomes\Tables\SliderHomesTable;
use App\Models\SliderHome;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderHomeResource extends Resource
{
    protected static ?string $model = SliderHome::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return SliderHomeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SliderHomesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSliderHomes::route('/'),
            'create' => CreateSliderHome::route('/create'),
            'edit' => EditSliderHome::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
