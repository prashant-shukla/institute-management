<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = [
            [
                'name' => 'Certificate of Completion',
                'title' => 'Laravel Course',
                'course_id' => 1, // Example course_id
                'logo_path' => 'path/to/logo.png',
                'background_path' => 'path/to/background.png',
                'elements' => json_encode([
                    'student_name' => 'Ram',
                    'father_name' => 'Sajjan',
                    'certificate_number' => 1000232,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ];

        DB::table('certificates')->insert($certificates);
    }
}
