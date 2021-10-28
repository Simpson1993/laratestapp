<?php

namespace App\Enum;

use App\Enum\Traits\LowerNameEnumTrait;
use Spatie\Enum\Enum;

/**
 * Class ColourEnum
 * @package App\Enum
 *
 * @method static self red()
 * @method static self white()
 * @method static self black()
 */
class ColourEnum extends Enum
{
    use LowerNameEnumTrait;

    const MAP_INDEX = [
        'red' => 1,
        'white' => 2,
        'black' => 3,
    ];
    const MAP_VALUE = [
        'red' => 'red',
        'white' => 'white',
        'black' => 'black',
    ];
}
