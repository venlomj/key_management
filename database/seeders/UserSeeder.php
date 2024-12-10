<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    final public function run(): void
    {
        $faker = Faker::create('nl_BE');

        DB::table('users')->insert(
            [
                [
                    'account_id' => uniqid(),
                    'first_name' => 'Murrel',
                    'last_name' => 'Venlo',
                    'email' => 'murrel.venlo@kogeka.be',
                    'admin' => true,
                    'password' => Hash::make('admin1234'),
                    'active' => true,
                    'employee_code' => 'EMP001',
                    'preferred_name' => 'Murrel',
                    'created_at' => now(),
                    'email_verified_at' => now(),
                ],
                [
                    'account_id' => uniqid(),
                    'first_name' => 'Yves',
                    'last_name' => 'Van Opstal',
                    'email' => 'yves.vanopstal@kogeka.be',
                    'admin' => true,
                    'password' => Hash::make('admin1234'),
                    'active' => true,
                    'employee_code' => 'EMP002',
                    'preferred_name' => 'Yves',
                    'created_at' => now(),
                    'email_verified_at' => now(),
                ],
                [
                    'account_id' => uniqid(),
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'john.doe@kogeka.be',
                    'admin' => true,
                    'password' => Hash::make('user1234'),
                    'active' => true,
                    'employee_code' => 'EMP003',
                    'preferred_name' => 'John',
                    'created_at' => now(),
                    'email_verified_at' => now(),
                ],
                [
                    'account_id' => uniqid(),
                    'first_name' => 'Jane',
                    'last_name' => 'Doe',
                    'email' => 'jane.doe@kogeka.be',
                    'admin' => false,
                    'password' => Hash::make('user1234'),
                    'active' => true,
                    'employee_code' => 'EMP004',
                    'preferred_name' => 'Jane',
                    'created_at' => now(),
                    'email_verified_at' => now(),
                ],
            ]
        );

        for ($i = 0; $i <= 40; $i++) {
            $active = ($i + 1) % 6 !== 0;
            DB::table('users')->insert(
                [
                    'account_id' => md5(time().rand()),
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->firstName.'.'.$faker->lastName.'@kogeka.be',
                    'admin' => false,
                    'password' => Hash::make("kogeka$i"),
                    'active' => $active,
                    'employee_code' => "EMP$i",
                    'preferred_name' => $faker->firstName,
                    'created_at' => now(),
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
