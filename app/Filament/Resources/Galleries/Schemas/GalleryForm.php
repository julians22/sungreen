<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                   SpatieMediaLibraryFileUpload::make('images')
                            ->collection('images')
                            ->disk('public')
                            ->multiple()
                            ->image()
                            ->columnSpan(3)
                        
                            
                            ,
                    
            ]);
    }
}
