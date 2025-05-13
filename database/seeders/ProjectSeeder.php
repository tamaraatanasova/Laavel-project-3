<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 9; $i++) {
            Project::create([
                'name' => $faker->words(2, true),
                'subtitle' => $faker->sentence(4),
                'image' => "https://picsum.photos/200/300",
                'url' => "https://example.com",
                'description' => $faker->paragraph(3),
            ]);
        }
    }
}
