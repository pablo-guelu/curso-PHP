<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Turn;
// use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //user with admin priviledges 
        // Role::create(['name' => 'admin']);

        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email'=> 'admin@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        User::factory(10)
        ->create()
        ->each(function ($user) {
            for ($i = 0; $i <= rand(5,20); $i++) {
                $turn = Turn::factory()->create();
                $user->turns()->save($turn);
            }

        $user->is_player = 1;

        $user->total_plays = count($user->turns);

        foreach ($user->turns as $play) {
            if($play->seven) {
                $user->wins += 1;
            }
        };

        if ($user->total_plays) {
            $user->winning_percentage = ($user->wins / $user->total_plays) * 100;
        } else {
            $user->winning_percentage = 0;
        }

        $user->save();

        });

    }
}
