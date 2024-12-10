<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    final public function run(): void
    {

        DB::table('keys')->insert([
            [
                'code' => 'KEY001',
                'type' => 'Admin',
                'image' => 'path/to/image1.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY002',
                'type' => 'User',
                'image' => 'path/to/image2.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY003',
                'type' => 'Guest',
                'image' => 'path/to/image3.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY004',
                'type' => 'Moderator',
                'image' => 'path/to/image4.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY005',
                'type' => 'Admin',
                'image' => 'path/to/image5.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY006',
                'type' => 'User',
                'image' => 'path/to/image6.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY007',
                'type' => 'Guest',
                'image' => 'path/to/image7.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY008',
                'type' => 'Moderator',
                'image' => 'path/to/image8.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY009',
                'type' => 'Admin',
                'image' => 'path/to/image9.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'KEY010',
                'type' => 'User',
                'image' => 'path/to/image10.png',
                'embedded_image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
