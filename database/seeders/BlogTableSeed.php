<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Blog;

class BlogTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Blog::create([
                'Title' => $faker->sentence(4, true),
                'Content' => $faker->paragraph(),
                'AuthorID' => $faker->numberBetween(1, 4),
            ]);
        }
    }
}
