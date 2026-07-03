<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(5)
                    ->columnSpanFull()
                    ->schema([
                        Section::make('General Information')
                            ->schema([
                                Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->required(),

                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('slug')
                                    ->required(),
                                Textarea::make('description')
                                    ->required(),

                                // Features
                                Textarea::make('additional_info.features')
                                    ->label('Features')
                                    ->columnSpanFull(),
                                // Quality
                                Textarea::make('additional_info.quality')
                                    ->label('Quality')
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(3),

                        Section::make('Related Products')
                            ->schema([
                                // Select::make('related_products')
                                //     ->label('Related Products')
                                //     ->multiple()
                                //     ->relationship('relatedProducts', 'name'),
                                Repeater::make('pivotRelatedProducts')
                                    ->relationship('pivotRelatedProducts')
                                    ->schema([
                                        Select::make('related_product_id')
                                            ->label('Related Product')
                                            ->relationship('relatedProduct', 'name', function ($query) {
                                                $query->where('id', '!=', request()->route('record'));
                                            })
                                            ->required(),
                                    ])
                                    ->orderColumn('sort_order')
                                    ->columns(1)
                                    ->addActionLabel('Add Related Product')
                            ])
                            ->columnSpan(2),
                    ]),

            ]);
    }
}
