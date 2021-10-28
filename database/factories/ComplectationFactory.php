<?php

namespace Database\Factories;

use App\Enum\ComplectationEnum;
use App\Models\Complectation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ComplectationFactory
 * @package Database\Factories
 */
class ComplectationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complectation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parameters' => json_encode($this->faker->words(rand(5, 15))),
            'complectation' => array_rand(array_flip(ComplectationEnum::getIndices())),
        ];
    }
}
