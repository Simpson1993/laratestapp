<?php

namespace App\Repositories;

use Elasticsearch\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

abstract class AbstractElasticsearchRepository
{
    /**
     * @var Client
     */
    protected $elasticsearch;

    /**
     * @param  Client  $elasticsearch
     */
    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * @param  Model  $model
     * @param  array  $items
     * @return Collection
     */
    public function buildCollection(Model $model, array $items): Collection
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');
        return $model::findMany($ids)
            ->sortBy(function ($model) use ($ids) {
                return array_search($model->id, $ids);
            });
    }
}