<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    final public function run(): void
    {
        $faker = Faker::create();

        $users = DB::table('users')->get(); // Get all users
        $keys = DB::table('keys')->get(); // Get all keys

        foreach ($users as $user) {
            $numOfKeys = rand(1, 5); // Randomly assign 1 to 3 keys per user

            // Assign keys to the user
            for ($i = 0; $i < $numOfKeys; $i++) {
                // Randomly pick a key
                $key = $keys->random();

                DB::table('user_keys')->insert([
                    'user_id' => $user->id,
                    'key_id' => $key->id,
                    'remark' => $faker->sentence(), // Generate a random remark for this key-user relationship
                    'quantity' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
