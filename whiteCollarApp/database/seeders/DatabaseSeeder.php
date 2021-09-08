<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Paint;
use Spatie\Permission\Models\Role;
use \App\Models\User;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        Store::factory(5)
        ->create()
        ->each(function ($store) {
            for ($i = 0; $i <= rand(10, 25); $i++) {
                $paint = Paint::factory()->create();
                $store->paints()->save($paint);
            }
        });

        //user with admin priviledges 
        Role::create(['name' => 'admin']);

        $admin = User::create([
            'name' => 'Admin',
            'email'=> 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);

        $admin->assignRole('admin');

        // user with only view privileges
        Role::create(['name' => 'client']);

        $client = User::create([
            'name' => 'client',
            'email'=> 'client@client.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10)
        ]);

        $client->assignRole('client');
    }
}
