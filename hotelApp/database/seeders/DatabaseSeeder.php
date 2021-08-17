<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Room;
use App\Models\Booking;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Booking::factory(10)
        ->create()
        ->each(function ($booking) {
            $room = Room::factory()->make();
            $booking->room()->save($room);
        });

        Room::factory(10)->create();

        Role::create(['name' => 'admin']);

        Role::create(['name' => 'employee']);

        $admin = User::create([
            'name' => 'Admin',
            'email'=> 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);

        $admin->assignRole('admin');
    }
}
