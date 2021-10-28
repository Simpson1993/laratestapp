<?php

namespace App\Enum;

use App\Enum\Traits\LowerNameEnumTrait;
use Spatie\Enum\Enum;

/**
 * Class ComplectationEnum
 * @package App\Enum
 *
 * @method static self base()
 * @method static self comfort()
 * @method static self luxury()
 */
class ComplectationEnum extends Enum
{
    use LowerNameEnumTrait;

    const MAP_INDEX = [
        'base' => 1,
        'comfort' => 2,
        'luxury' => 3,
    ];
    const MAP_VALUE = [
        'base' => 'base',
        'comfort' => 'comfort',
        'luxury' => 'luxury',
    ];
}
