<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    #[Scope]
    protected function ofFilters(Builder $query, array $filters): void
    {
        $query->when($filters['name'], function (Builder $query, string $filter): void {
            $query->where('name', 'like', "%{$filter}%");
        });
    }

    public function Activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class);
    }
}
