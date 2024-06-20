<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\News;
class NewsSeeder extends Seeder
{
    public function run()
    {
        News::factory()->count(10)->create();
        
    }
}
