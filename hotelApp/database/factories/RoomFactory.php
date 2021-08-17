<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->randomNumber(3, true),
            'type' => $this->faker->randomElement(['single', 'double']),
            // 'booking_id' => function() {
            //     return Booking::where('room_id', $this);
            //     },
        ];
    }
}
