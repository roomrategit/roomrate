<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();
        Advertisement::factory()->count(5)->create();
        Review::factory()->count(5)->create();
    }
}
