<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fields = [
            ['field_name' => 'student_name', 'table_name' => 'students', 'column_name' => 'name'],
            ['field_name' => 'father_name', 'table_name' => 'students', 'column_name' => 'father_name'],
            ['field_name' => 'course_title', 'table_name' => 'courses', 'column_name' => 'name'],
            ['field_name' => 'product_covered', 'table_name' => 'students', 'column_name' => 'software_covered'],
            ['field_name' => 'duration', 'table_name' => 'courses', 'column_name' => 'course_period'],
            ['field_name' => 'from_date', 'table_name' => 'student_courses', 'column_name' => 'enrolled'],
            ['field_name' => 'to_date', 'table_name' => 'student_courses', 'column_name' => 'completion'],
            ['field_name' => 'date', 'table_name' => 'student_courses', 'column_name' => 'certificate_issued'],
            ['field_name' => 'certificate_number', 'table_name' => 'student_courses', 'column_name' => 'certificate_number'],
            ['field_name' => 'remark', 'table_name' => 'student_courses', 'column_name' => 'remark'],
        ];

        DB::table('certificate_fields')->insert($fields);
    }
    
   

}
