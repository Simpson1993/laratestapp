<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\ItemResource;

class ItemCollection extends BaseCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ItemResource::class;
}
