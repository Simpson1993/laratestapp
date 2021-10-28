<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\ComplectationResource;

class ComplectationCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ComplectationResource::class;
}
