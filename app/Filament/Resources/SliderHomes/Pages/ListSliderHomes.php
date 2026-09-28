<?php

namespace App\Filament\Resources\SliderHomes\Pages;

use App\Filament\Resources\SliderHomes\SliderHomeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSliderHomes extends ListRecords
{
    protected static string $resource = SliderHomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
