<?php

namespace App\Enum\Traits;

/**
 * Trait LowerNameEnumTrait
 * @package App\Enum
 */
trait LowerNameEnumTrait
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return strtolower(parent::getName());
    }
}
