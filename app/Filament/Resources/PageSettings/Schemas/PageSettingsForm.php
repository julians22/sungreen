<?php

namespace App\Filament\Resources\PageSettings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class PageSettingsForm
{
    public static function configure(Schema $schema): Schema
    {
        $routeOptions = collect(Route::getRoutes())
            ->map(fn($route) => $route->getName())
            ->filter(fn($name) => filled($name) && !Str::startsWith(
                $name,
                [
                    'filament.',
                    'livewire.',
                    'storage.',
                    'boost.',
                    'default-livewire.',
                ]
            ))
            ->sort()
            ->mapWithKeys(fn($name) => [$name => $name]);
        return $schema
            ->components([
                Section::make('Page Settings')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title'),
                        TextInput::make('meta_description')
                            ->label('Meta Description'),
                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords'),
                        Select::make('meta_key')
                            ->label('Meta Key (Route Name)')
                            ->options($routeOptions)
                            ->searchable()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),
            ]);
    }
}
