<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'reg_date' => Carbon::create('2024', '06', '20'),
                'reg_no' => '10001',
                'father_name' => 'Amelia Windler',
                'date_of_birth' => Carbon::create('2000', '06', '17'),
                'correspondence_add' => '4899 Fannie Walk Suite 480, Osinskiport,',
                'permanent_add' => '76257 Abernathy Dale',
                'qualification' => 'MCA',
                'college_workplace' => 'Lockman Ltd',
                'course_fee' => 18091,
                'residential_no' => '1-423-600-9307',
                'office_no' => '1-775-978-6108',
                'mobile_no' => '8634514919',
                'course_id' => 2,
                'user_id' => 2,
               
            ],
            
        ];

        DB::table('students')->insert($students);
    }
}
