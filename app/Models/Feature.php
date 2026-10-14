<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'icon',
        'image_path',
        'sort_order',
    ];
}
