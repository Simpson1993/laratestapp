<?php

namespace App\Repositories;

use App\Repositories\Contracts\SearchRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ItemEloquentRepository implements SearchRepository
{
    public function search(Model $model, string $query = ''): Collection
    {
        return $model::query()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('year', 'like', "%{$query}%")
            ->get();
    }
}