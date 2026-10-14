<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSettings extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_key',
    ];
}
