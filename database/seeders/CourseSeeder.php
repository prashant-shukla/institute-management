<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Computer Science',
                'slug' => 'computer-science',
                'course_duration' => '4 Years',
                'CourseCategories_id' => 1, // Example branch_id
                'sub_title' => 'B.Tech in Computer Science',
                'popular_course' => 1,
                'image' => 'path/to/image.jpg',
                'description' => 'A comprehensive course in computer science.',
                'site_title' => 'B.Tech Computer Science',
                'meta_keyword' => 'computer, science, btech',
                'meta_description' => 'B.Tech in Computer Science.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mechanical Engineering',
                'slug' => 'mechanical-engineering',
                'course_duration' => '4 Years',
                'CourseCategories_id' => 2, // Example branch_id
                'sub_title' => 'B.Tech in Mechanical Engineering',
                'popular_course' => 0,
                'image' => 'path/to/image.jpg',
                'description' => 'A comprehensive course in mechanical engineering.',
                'site_title' => 'B.Tech Mechanical Engineering',
                'meta_keyword' => 'mechanical, engineering, btech',
                'meta_description' => 'B.Tech in Mechanical Engineering.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more course entries as needed
        ];

        DB::table('courses')->insert($courses);
    }
}
