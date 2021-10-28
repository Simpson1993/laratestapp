<?php

namespace App\Providers;

use App\Console\Commands\IndexItems;
use App\Repositories\Contracts\SearchRepository;
use App\Repositories\ItemElasticsearchRepository;
use App\Repositories\ItemEloquentRepository;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //@todo Check when/needs binding

        if (env('ELASTICSEARCH_ENABLE')) {
            $this->app->bind(
                SearchRepository::class,
                ItemElasticsearchRepository::class
            );
        } else {
            $this->app->bind(
                SearchRepository::class,
                ItemEloquentRepository::class
            );
        }
    }
}
