<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\CropPosition;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;

class Product extends Model implements HasMedia
{
    use HasSlug, InteractsWithMedia, HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'additional_info', 'category_id'];

    protected $casts = [
        'additional_info' => 'array',
    ];

    public function getSlugOptions(): \Spatie\Sluggable\SlugOptions
    {
        return \Spatie\Sluggable\SlugOptions::create()
            ->generateSlugsFrom('name')
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo('slug');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_product_id');
    }

    public function pivotRelatedProducts()
    {
        return $this->hasMany(RelatedProduct::class, 'product_id');
    }

    // Image Collections
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->singleFile();

        $this->addMediaCollection('gallery');
    }

    // Image Conversions
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->format('webp')
            ->crop(200, 200, CropPosition::Center)
            ->nonQueued();

        $this->addMediaConversion('medium')
            ->format('webp')
            ->width(500)
            ->nonQueued();
    }
}
