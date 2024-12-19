<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyCabinetStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('key_cabinet_storages')->insert([
            ['key_id' => 1, 'key_cabinet_id' => 1, 'hook_number' => 'H1', 'description' => 'Sleutel voor administratief gebruik', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 2, 'key_cabinet_id' => 1, 'hook_number' => 'H2', 'description' => 'Sleutel voor gebruikers toegang', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 3, 'key_cabinet_id' => 2, 'hook_number' => 'H3', 'description' => 'Sleutel voor gasten', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 4, 'key_cabinet_id' => 3, 'hook_number' => 'H4', 'description' => 'Sleutel voor moderator', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 5, 'key_cabinet_id' => 3, 'hook_number' => 'H5', 'description' => 'Sleutel voor speciale toegang', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 6, 'key_cabinet_id' => 4, 'hook_number' => 'H6', 'description' => 'Sleutel voor bovenste verdieping', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 7, 'key_cabinet_id' => 5, 'hook_number' => 'H7', 'description' => 'Sleutel voor kelderruimte', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 8, 'key_cabinet_id' => 6, 'hook_number' => 'H8', 'description' => 'Sleutel voor zolder', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 9, 'key_cabinet_id' => 7, 'hook_number' => 'H9', 'description' => 'Sleutel voor parkeer garage', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 10, 'key_cabinet_id' => 8, 'hook_number' => 'H10', 'description' => 'Sleutel voor ondergrondse ruimte', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 11, 'key_cabinet_id' => 9, 'hook_number' => 'H11', 'description' => 'Sleutel voor hoofdkantoor', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 12, 'key_cabinet_id' => 10, 'hook_number' => 'H12', 'description' => 'Sleutel voor werkplaats', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 13, 'key_cabinet_id' => 1, 'hook_number' => 'H13', 'description' => 'Sleutel voor extra toegang', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 14, 'key_cabinet_id' => 5, 'hook_number' => 'H14', 'description' => 'Sleutel voor extra magazijn', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 15, 'key_cabinet_id' => 6, 'hook_number' => 'H15', 'description' => 'Sleutel voor brandalarm toegang', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 16, 'key_cabinet_id' => 7, 'hook_number' => 'H16', 'description' => 'Sleutel voor parkeerplaats toegang', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 17, 'key_cabinet_id' => 8, 'hook_number' => 'H17', 'description' => 'Sleutel voor toegang naar magazijn', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 18, 'key_cabinet_id' => 9, 'hook_number' => 'H18', 'description' => 'Sleutel voor toegang naar lobby', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 19, 'key_cabinet_id' => 10, 'hook_number' => 'H19', 'description' => 'Sleutel voor toegang naar toiletten', 'created_at' => now(), 'updated_at' => now()],
            ['key_id' => 20, 'key_cabinet_id' => 11, 'hook_number' => 'H20', 'description' => 'Sleutel voor serverruimte', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
