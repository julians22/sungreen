<?php

namespace App\Filament\Resources\SliderHomes\Pages;

use App\Filament\Resources\SliderHomes\SliderHomeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSliderHome extends EditRecord
{
    protected static string $resource = SliderHomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
