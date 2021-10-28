<?php

namespace App\Repositories;

use App\Repositories\Contracts\SearchRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ItemElasticsearchRepository extends AbstractElasticsearchRepository implements SearchRepository
{
    /**
     * @param  Model  $model
     * @param  string  $query
     * @return Collection
     */
    public function search(Model $model, string $query = ''): Collection
    {
        $items = $this->searchOnElasticsearch($model, $query);
        return $this->buildCollection($model, $items);
    }

    /**
     * @param  Model $model
     * @param  string $query
     * @return array
     */
    private function searchOnElasticsearch(Model $model, string $query = ''): array
    {
        $params = [
            'index' => $model->getElasticIndex(),
            'type'  => $model->getElasticType(),
            'body' => [
                'sort' => [
                    '_score'
                ],
                'query' => [
                    'bool' => [
                        'should' => [
                            ['match' => [
                                'title' => [
                                    'query'     => $query,
                                    'fuzziness' => '2'
                                ]
                            ]],
                            ['match' => [
                                'description' => [
                                    'query'     => $query,
                                    'fuzziness' => '1'
                                ]
                            ]],
                            ['match' => [
                                'complectations' => [
                                    'query'      => $query,
                                    'fuzziness'  => '1'
                                ]
                            ]]
                        ]
                    ],
                ],
            ]
        ];

        return $this->elasticsearch->search($params);
    }
}