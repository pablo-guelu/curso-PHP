<?php

namespace Database\Factories;

use App\Models\Turn;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dice1 = $this->faker->numberBetween(1, 6);
        $dice2 = $this->faker->numberBetween(1, 6);
        return [
            'dice1' => $dice1,
            'dice2' => $dice2,
            'seven' => ($dice1 + $dice2 == 7 ? true : false),
        ];
    }
}
