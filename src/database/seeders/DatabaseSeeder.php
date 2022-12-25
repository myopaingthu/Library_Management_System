<?php

namespace Database\Seeders;

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
        \App\Models\Admin::factory(1)->create();
        \App\Models\Setting::factory(1)->create();
        \App\Models\Publisher::factory(5)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Author::factory(5)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Book::factory(10)->create();
    }
}
