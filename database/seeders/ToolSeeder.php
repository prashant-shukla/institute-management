<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'name' => 'AutoCAD',
                'description' => 'Description of Tool 1',
                'version' => '1.0',
                'image' => 'tool1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Photoshop',
                'description' => 'Description of Tool 1',
                'version' => '1.0',
                'image' => 'tool1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '3ds Max',
                'description' => 'Description of Tool 1',
                'version' => '1.0',
                'image' => 'tool1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'v-ray',
                'description' => 'Description of Tool 1',
                'version' => '1.0',
                'image' => 'tool1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lumion',
                'description' => 'Description of Tool 2',
                'version' => '2.1',
                'image' => 'tool2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        // Insert data into tools table
        DB::table('tools')->insert($tools);
    }

}
