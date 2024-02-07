<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Comments;

class CommentTableSeed extends Seeder
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
        for ($i = 0; $i < 5; $i++) {
            Comments::create([
                'Content' => $faker->sentence(4, true),
                'BlogID' => $faker->numberBetween(1, 50),
                'UserID' => $faker->numberBetween(1, 4),
            ]);
        }
    }
}
