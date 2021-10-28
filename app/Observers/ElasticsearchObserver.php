<?php

namespace App\Observers;

use Elasticsearch\Client;
use Illuminate\Database\Eloquent\Model;

class ElasticsearchObserver
{
    /**
     * @var Client
     */
    private $elasticsearch;

    /**
     * @param  Client  $elasticsearch
     */
    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * @param  Model  $model
     */
    public function saved(Model $model)
    {
        $this->elasticsearch->index($model->creatingIndexData());
    }

    /**
     * @param  Model  $model
     */
    public function deleted(Model $model)
    {
        $this->elasticsearch->delete($model->removingIndexData());
    }
}
