<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'checkin' => $this->faker->dateTimeBetween('now', '+4 week'),
            'checkout' => $this->faker->dateTimeBetween('now', '+5 week'),
            // 'room_id' => Room::factory(),
            
            // function(array $attributes) {
            //     return Booking::find($attributes['phone'])->room;
            // },
        ];
    }
}
