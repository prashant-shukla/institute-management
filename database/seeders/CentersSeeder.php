<?php

namespace Database\Seeders;

use App\Models\Centers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Centers::factory(count:10)->create();
    }
}
