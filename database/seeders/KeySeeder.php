<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    final public function run(): void
    {
        $faker = Faker::create();

        for ($k = 1; $k <= 25; $k++) {
            DB::table('keys')->insert([
                'code' => $faker->unique()->bothify('??###'),  // Generates a code like A1, B2, etc.
                'type' => $faker->randomElement(['Yale', 'Schlage', 'Kwikset', 'Medeco']), // Random key types
                'image' => 'path/to/image' . $k . '.png', // Random image path
                'embedded_image' => $faker->imageUrl(), // Random embedded image URL
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
