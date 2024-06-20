<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        [
            'name' => 'Tech Conference 2024',
            'slug' => 'tech-conference-2024',
            'organizer' => 'Tech Events Inc.',
            'start_date' => '2024-09-15 09:00:00',
            'end_date' => '2024-09-17 17:00:00',
            'paid' => 250.00,
            'address' => '123 Conference Center Dr, New York, NY',
            'description' => 'Annual technology conference covering latest trends and innovations.',
            'site_title' => 'Innovate & Inspire',
            'meta_keyword' => 'tech conference, technology event, innovation',
            'meta_description' => 'Join us for the most exciting tech conference of the year!',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
