<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;


class StaffSeeder extends Seeder
{
   
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'user_id' => 3,
                'department' => 'HR',
                'phone' => '1234567890',
                'date_joined' => '2022-01-15',
                'salary' => 50000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'department' => 'Finance',
                'phone' => '0987654321',
                'date_joined' => '2021-03-12',
                'salary' => 60000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

