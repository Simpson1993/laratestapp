<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface SearchRepository
{
    /**
     * @param  Model  $model
     * @param  string  $query
     * @return Collection
     */
    public function search(Model $model, string $query = ''): Collection;
}