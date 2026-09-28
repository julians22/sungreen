<?php

namespace App\Filament\Resources\SliderHomes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class SliderHomeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               FileUpload::make('sliders_desktop')
                    ->label('Slider Image Desktop')
                    ->image()
                    ->required(),
                FileUpload::make('sliders_mobile')
                    ->label('Slider Image Mobile')
                    ->image()
                    ->required(),
        ]

            );
    }
}
