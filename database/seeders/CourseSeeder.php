<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Course::factory()->count(10)->create();

        $courses = [
            [
                'name' => 'B.Tech in Computer Science',
                'slug' => 'btech-computer-science',
                'course_duration' => '4 Years',
                'course_categories_id' => 1, // Replace with actual category ID
                'sub_title' => 'Computer Science',
                'popular_course' => 1,
                'image' => 'path/to/image.jpg',
                'description' => 'A comprehensive course in computer science.',
                'site_title' => 'B.Tech Computer Science',
                'meta_keyword' => 'computer, science',
                'meta_description' => 'B.Tech in Computer Science.',
                'mode' => 'offline',
                'sessions' => 10,
                'projects' => 15,
                'fee' => 18000.00,
                'offer_fee' => 16000.00,
                'faqs' => json_encode(['What is the eligibility criteria?', 'How are the placements?']),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Diploma in Interior Design',
                'slug' => 'diploma-interior-design',
                'course_duration' => '2 Years',
                'course_categories_id' => 2, // Replace with actual category ID
                'sub_title' => 'Interior Design',
                'popular_course' => 0,
                'image' => 'path/to/image.jpg',
                'description' => 'Learn interior design techniques and principles.',
                'site_title' => 'Diploma in Interior Design',
                'meta_keyword' => 'interior, design',
                'meta_description' => 'Diploma in Interior Design.',
                'mode' => 'online',
                'sessions' => 12,
                'projects' => 2,
                'fee' => 15000.00,
                'offer_fee' => 13000.00,
                'faqs' => json_encode(['What software tools will be taught?', 'Are there any internships?']),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
       ];

        DB::table('courses')->insert($courses);
    }
}
