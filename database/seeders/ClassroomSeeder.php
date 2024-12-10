<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            [
                'key_id' => 1, 'classroom_name' => 'Trapzalen en doorgangen', 'classroom_code' => '100Y', 'classroom_block' => 'D',
                'classroom_description' => 'Trapzalen en doorgangen', 'short_description' => 'Traphal', 'note' => null,
                'institution_id' => 4, 'first_specification' => null, 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Trapzalen en doorgangen', 'classroom_code' => '116', 'classroom_block' => 'A',
                'classroom_description' => 'Trapzalen en doorgangen', 'short_description' => 'Gang Repro', 'note' => null,
                'institution_id' => 4, 'first_specification' => null, 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Kantoorruimte', 'classroom_code' => '116A', 'classroom_block' => 'A',
                'classroom_description' => 'Kantoorruimte', 'short_description' => 'Bureau Repro', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Reprografie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Kantoorruimte', 'classroom_code' => '116B', 'classroom_block' => 'A',
                'classroom_description' => 'Kantoorruimte', 'short_description' => 'Bureau Boekhouding', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Reprografie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Kantoorruimte', 'classroom_code' => '117', 'classroom_block' => 'A',
                'classroom_description' => 'Kantoorruimte', 'short_description' => 'Bureau Centrale Dienst', 'note' => 's',
                'institution_id' => 4, 'first_specification' => 'Administratie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Kantoorruimte', 'classroom_code' => '118', 'classroom_block' => 'B',
                'classroom_description' => 'Kantoorruimte', 'short_description' => 'Bureau Externen', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Externe Dienstverlening', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Computerlokaal', 'classroom_code' => '119', 'classroom_block' => 'B',
                'classroom_description' => 'Computerlokaal', 'short_description' => 'Bureau Internet', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Informatica', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Vergaderruimte', 'classroom_code' => '120', 'classroom_block' => 'C',
                'classroom_description' => 'Vergaderruimte', 'short_description' => 'Bureau Management', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Management', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '121', 'classroom_block' => 'D',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Receptie', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Receptie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '122', 'classroom_block' => 'E',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Beveiliging', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Beveiliging', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '123', 'classroom_block' => 'E',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Bedrijf', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Bedrijfsvoering', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '124', 'classroom_block' => 'F',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Opleidingen', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Opleidingen', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '125', 'classroom_block' => 'F',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Receptie 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Receptie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '126', 'classroom_block' => 'G',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Systeembeheer', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Systeembeheer', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '127', 'classroom_block' => 'G',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Beveiliging 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Beveiliging', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '128', 'classroom_block' => 'G',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Opleidingen 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Opleidingen', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '129', 'classroom_block' => 'H',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Training', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Training', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '130', 'classroom_block' => 'I',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Interview', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Interview', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '131', 'classroom_block' => 'I',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Overleg', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Overleg', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '132', 'classroom_block' => 'J',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Congres', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Congres', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '133', 'classroom_block' => 'J',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Werkplek', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Werkplek', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '134', 'classroom_block' => 'K',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Presentatie', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Presentatie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '135', 'classroom_block' => 'L',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Support', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Support', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '136', 'classroom_block' => 'M',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Service', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Service', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '137', 'classroom_block' => 'M',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Kantoor', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Kantoor', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '138', 'classroom_block' => 'N',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Directie', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Directie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '139', 'classroom_block' => 'O',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Conferentie', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Conferentie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '140', 'classroom_block' => 'P',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Vergadering', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Vergadering', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '141', 'classroom_block' => 'Q',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Beheer', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Beheer', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '142', 'classroom_block' => 'R',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Toegang', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Toegang', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '143', 'classroom_block' => 'S',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Beveiliging 3', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Beveiliging', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '144', 'classroom_block' => 'T',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Operationeel', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Operationeel', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '145', 'classroom_block' => 'U',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Strategie', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Strategie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '146', 'classroom_block' => 'V',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Werkplek 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Werkplek', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '147', 'classroom_block' => 'W',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Vergadering 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Vergadering', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '148', 'classroom_block' => 'X',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Directie 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Directie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '149', 'classroom_block' => 'Y',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Presentatie 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Presentatie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '150', 'classroom_block' => 'Z',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Congres 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Congres', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '151', 'classroom_block' => 'A1',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Beveiliging 4', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Beveiliging', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '152', 'classroom_block' => 'B1',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Strategie 2', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Strategie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '153', 'classroom_block' => 'C1',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Directie 3', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Directie', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '154', 'classroom_block' => 'D1',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Vergadering 3', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Vergadering', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'key_id' => 1, 'classroom_name' => 'Lokaal', 'classroom_code' => '155', 'classroom_block' => 'E1',
                'classroom_description' => 'Lokaal', 'short_description' => 'Lokaal Kantoor 3', 'note' => null,
                'institution_id' => 4, 'first_specification' => 'Kantoor', 'second_specification' => null, 'search_field' => null,
                'created_at' => now(), 'updated_at' => now(),
            ],
        ];

        // Insert all the records
        foreach ($classrooms as $classroom) {
            Classroom::create($classroom);
        }
    }
}
