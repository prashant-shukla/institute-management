<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::firstOrCreate(
            ['id' => 1],
            ['name' => 'Super Admin Team']
        );

        $teams = ['Admin Team', 'Teacher Team', 'Student Team'];

        foreach ($teams as $teamName) {
            Team::firstOrCreate(['name' => $teamName]);
        }
    }
}
