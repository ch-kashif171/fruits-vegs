<?php

namespace App\Models;

use Database\Factories\ProduceItemFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'category', 'icon', 'image_path', 'theme', 'sort_order', 'status'])]
class ProduceItem extends Model
{
    /** @use HasFactory<ProduceItemFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    #[Scope]
    protected function ordered(Builder $query): Builder
    {
        return $query->orderBy('sort_order');
    }

    #[Scope]
    protected function active(Builder $query): Builder
    {
        return $query->whereStatus('1');
    }

    #[Scope]
    protected function category(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }
}
