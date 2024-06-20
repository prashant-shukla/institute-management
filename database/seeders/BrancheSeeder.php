<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrancheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Engineering Branch',
                'slug' => 'engineering-branch',
                'software' => json_encode(['AutoCAD', 'MATLAB']),
                'sub_title' => 'Engineering Studies',
                'image' => 'path/to/image.jpg',
                'order' => 1,
                'show_on_website' => true,
                'site_title' => 'Engineering Courses',
                'meta_keyword' => 'engineering, courses, education',
                'meta_description' => 'Engineering courses and studies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medical Branch',
                'slug' => 'medical-branch',
                'software' => json_encode(['MedCalc', 'SPSS']),
                'sub_title' => 'Medical Studies',
                'image' => 'path/to/image.jpg',
                'order' => 2,
                'show_on_website' => true,
                'site_title' => 'Medical Courses',
                'meta_keyword' => 'medical, courses, education',
                'meta_description' => 'Medical courses and studies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more branch entries as needed
        ];

        DB::table('branches')->insert($branches);
    }
}

