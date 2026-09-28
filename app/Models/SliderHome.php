<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderHome extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['sliders_desktop', 'sliders_mobile'];

}
