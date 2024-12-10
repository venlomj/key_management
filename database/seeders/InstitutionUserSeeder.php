<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the institution with the name 'Sint Jozef Geel'
        $institution = DB::table('institutions')->where('name', 'Sint Jozef Geel')->first();

        if ($institution) {
            // List of users who should be associated with 'Sint Jozef Geel'
            $users = DB::table('users')->whereIn('first_name', ['Murrel', 'Yves'])->get();

            // Associate Murrel and Yves to 'Sint Jozef Geel'
            foreach ($users as $user) {
                DB::table('institution_users')->insert([
                    'user_id' => $user->id,
                    'institution_id' => $institution->id, // Use the institution ID
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Now, assign random institutions to other users (except Murrel and Yves)
        $otherUsers = DB::table('users')->whereNotIn('first_name', ['Murrel', 'Yves'])->get();

        foreach ($otherUsers as $user) {
            // Get all institution IDs (except 'Sint Jozef Geel' to avoid duplication)
            $institutions = DB::table('institutions')->pluck('id')->toArray();

            // Randomly pick 1 or 2 institutions
            $selectedInstitutions = array_rand($institutions, 2); // Randomly select 2 institutions

            // Fix for array_rand: check if multiple institutions are selected
            if (is_array($selectedInstitutions)) {
                foreach ($selectedInstitutions as $institutionId) {
                    DB::table('institution_users')->insert([
                        'user_id' => $user->id,
                        'institution_id' => $institutions[$institutionId], // Insert the random institution ID
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                DB::table('institution_users')->insert([
                    'user_id' => $user->id,
                    'institution_id' => $institutions[$selectedInstitutions], // Insert the random institution ID
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
