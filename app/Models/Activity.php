<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    #[Scope]
    protected function ofFilters(Builder $query, array $filters): void
    {
        $query->when($filters['id'], function (Builder $query, $id) {
            $query->where('id', $id);
        });
    }

    public function Tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
