<?php

namespace App\Models;

use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'slug',
    'title',
    'meta_description',
    'hero_title',
    'hero_subtitle',
    'hero_image',
    'extra',
])]
class Page extends Model
{
    /** @use HasFactory<PageFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'extra' => 'array',
        ];
    }

    #[Scope]
    protected function forSlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    public function extraValue(string $key, mixed $default = null): mixed
    {
        return data_get($this->extra, $key, $default);
    }
}
