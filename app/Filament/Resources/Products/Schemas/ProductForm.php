<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\RichEditor\ToolbarButtonGroup;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
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
                                RichEditor::make('description')
                                    ->toolbarButtons([
                                        'bold',
                                        [ToolbarButtonGroup::make('Paragraph', ['paragraph', 'h1', 'h2', 'h3'])->textualButtons()],
                                        'italic',
                                        'underline',
                                        'strike',
                                        'link',
                                        'codeBlock',
                                        'bulletList',
                                        'orderedList',
                                        'blockquote',
                                    ])
                                    ->required(),
                                Repeater::make('sliders')
                    ->label('Produk Slider')
                    ->schema([
                        Select::make('desktop_position')
                            ->options([
                        'top_center'    => 'Top Center',
                        'top_right'     => 'Top Right',
                        'top_left'      => 'Top Left',
                        'bottom_right'  => 'Bottom Right',
                        'bottom_left'   => 'Bottom Left',
                        'bottom_center' => 'Bottom Center',
                            ])
                            ->distinct()
                            ->required(),
                            Select::make('mobile_position')
            ->label('Urutan / Posisi (Mobile)')
            ->options([
                '1' => 'Urutan Pertama (1)',
                '2' => 'Urutan Kedua (2)',
                '3' => 'Urutan Ketiga (3)',
                '4' => 'Urutan Keempat (4)',
                '5' => 'Urutan Kelima (5)',
                '6' => 'Urutan Keenam (6)',
                '7' => 'Urutan Ketujuh (7)',
                '8' => 'Urutan Kedelapan (8)',
            ])
            ->required(),
                            TextInput::make('title')
                            ->label('Judul')
                            ->required(),
                            Textarea::make('description')
                            ->label('Deskripsi Produk'),
                            FileUpload::make('image')
                            ->label('Gambar Produk')
                            ->disk('public')
                            ->image()
                    ])
                    ->columns(1)
                    ->collapsible()
                    ->columnSpanFull()
                    ->addActionLabel('Tambah Slider')
                    ->collapsed(),
                                // Features
                                RichEditor::make('additional_info.features')
                                    ->label('Features')
                                    ->toolbarButtons([
                                        'bold',
                                        [ToolbarButtonGroup::make('Paragraph', ['paragraph', 'h1', 'h2', 'h3'])->textualButtons()],
                                        'italic',
                                        'underline',
                                        'strike',
                                        'link',
                                        'codeBlock',
                                        'bulletList',
                                        'orderedList',
                                        'blockquote',
                                    ])
                                    ->columnSpanFull(),
                                // Quality
                                RichEditor::make('additional_info.quality')
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'link',
                                        'codeBlock',
                                        'bulletList',
                                        'orderedList',
                                        'blockquote',
                                    ])
                                    ->label('Quality')
                                    ->columnSpanFull(),
                            SpatieMediaLibraryFileUpload::make('thumbnail_products')
                            ->collection('thumbnail')
                            ->appendFiles()
                            ->multiple()
                            ->disk('public')
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
