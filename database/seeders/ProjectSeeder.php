<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table("projects")->insert([
            "title" => $faker->words(2),
            "description" => $faker->text(400),
            "image" => $faker->url()
        ]);
    }
}
