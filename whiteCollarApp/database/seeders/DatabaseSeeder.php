<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Paint;

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
    }
}
