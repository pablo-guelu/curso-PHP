<?php

namespace Database\Factories;

use App\Models\Paint;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'author' => $this->faker->name(),
            'entry' => $this->faker->dateTime(),
            'image' => $this->faker->imageURL(),
            'price' => $this->faker->numberBetween(400, 5000),
        ];
    }
}
