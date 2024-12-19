<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyCabinetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('key_cabinets')->insert([
            ['cabinet_name' => 'Kast 1', 'location' => 'Eerste verdieping', 'capacity' => 50, 'current_count' => 5, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 2', 'location' => 'Tweede verdieping', 'capacity' => 50, 'current_count' => 3, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 3', 'location' => 'Derde verdieping', 'capacity' => 50, 'current_count' => 7, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 4', 'location' => 'Bovenste verdieping', 'capacity' => 75, 'current_count' => 10, 'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 5', 'location' => 'Kelder', 'capacity' => 30, 'current_count' => 5, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 6', 'location' => 'Zolder', 'capacity' => 60, 'current_count' => 12, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 7', 'location' => 'Parkeer garage', 'capacity' => 40, 'current_count' => 8, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 8', 'location' => 'Ondergrondse ruimte', 'capacity' => 100, 'current_count' => 20, 'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 9', 'location' => 'Hoofdkantoor', 'capacity' => 90, 'current_count' => 30, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 10', 'location' => 'Werkplaats', 'capacity' => 80, 'current_count' => 50, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 11', 'location' => 'Begane grond', 'capacity' => 60, 'current_count' => 5, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 12', 'location' => 'Slaapkamer', 'capacity' => 100, 'current_count' => 35, 'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 13', 'location' => 'Bibliotheek', 'capacity' => 75, 'current_count' => 30, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 14', 'location' => 'Lounge', 'capacity' => 90, 'current_count' => 60, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 15', 'location' => 'Keuken', 'capacity' => 45, 'current_count' => 22, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 16', 'location' => 'Ziekenhuis', 'capacity' => 120, 'current_count' => 40, 'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 17', 'location' => 'Garage', 'capacity' => 55, 'current_count' => 15, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 18', 'location' => 'Werkplaats 2', 'capacity' => 70, 'current_count' => 50, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 19', 'location' => 'Opbergruimte', 'capacity' => 65, 'current_count' => 25, 'status' => 'inactive', 'created_at' => now(), 'updated_at' => now()],
            ['cabinet_name' => 'Kast 20', 'location' => 'Onderzoekslaboratorium', 'capacity' => 110, 'current_count' => 70, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
