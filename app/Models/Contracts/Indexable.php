<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Indexable
{
    /**
     * @return string
     */

    public function getElasticIndex(): string;
    /**
     * @return string
     */
    public function getElasticType(): string;

    /**
     * @return array
     */
    public function getIndexFields(): array;
}