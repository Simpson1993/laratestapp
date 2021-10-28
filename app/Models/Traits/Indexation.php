<?php

namespace App\Models\Traits;

use App\Observers\ElasticsearchObserver;

/**
 * Use with App\Models\Contracts\Indexable contract
 */
trait Indexation
{
    /**
     * Booting Elasticsearch Observer
     */
    public static function bootIndexation()
    {
        static::observe(ElasticsearchObserver::class);
    }

    /**
     * @return array
     */
    public function creatingIndexData(): array
    {
        return [
            'body'  => $this->getIndexFields(),
            'id'    => $this->id,
            'index' => $this->getElasticIndex(),
            'type'  => $this->getElasticType(),
        ];
    }

    /**
     * @return array
     */
    public function removingIndexData(): array
    {
        return [
            'id'    => $this->id,
            'index' => $this->getElasticIndex(),
            'type'  => $this->getElasticType(),
        ];
    }
}