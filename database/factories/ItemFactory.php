<?php

namespace Database\Factories;

use App\Enum\ColourEnum;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ItemFactory
 * @package Database\Factories
 */
class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name(),
            'description' => $this->faker->realText(400),
            'year' => $this->faker->year(),
            'colour' => array_rand(array_flip(ColourEnum::getIndices())),
        ];
    }
}
