<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert some schools (inside the up-function!)
        DB::table('institutions')->insert(
            [
                [
                    'id' => 1,
                    'abbreviation' => 'SMIK',
                    'name' => "Sancta Maria Kasterlee",
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'abbreviation' => 'SAG',
                    'name' => "Sint Aloysius Geel",
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'abbreviation' => 'SDGC',
                    'name' => "Sint Dimpna Geel · College",
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'abbreviation' => 'SJG',
                    'name' => "Sint Jozef Geel",
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 5,
                    'abbreviation' => 'SMG',
                    'name' => "Sint Maria Geel",
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 6,
                    'abbreviation' => 'SDGB',
                    'name' => "Sint Dimpna Geel · Basisschool",
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 7,
                    'abbreviation' => 'KOGEKA',
                    'name' => "Kogeka",
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
