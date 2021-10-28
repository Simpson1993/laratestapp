<?php

namespace App\Http\Resources;

use App\Enum\ComplectationEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class ComplectationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'parameters' => $this->parameters,
            'complectation' => ComplectationEnum::make($this->complectation)->getValue(),
        ];
    }
}
