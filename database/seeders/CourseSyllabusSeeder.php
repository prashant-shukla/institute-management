<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseSyllabus;

class CourseSyllabusSeeder extends Seeder
{
    
    public function run(): void
    {
        CourseSyllabus::factory()->count(10)->create();
    }
}

