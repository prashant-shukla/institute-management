<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\CourseCategory;
class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CourseCategory::factory()->count(10)->create();

        DB::table('course_categories')->insert([
            'name' => 'B.Arch',
            'slug' => 'barch',
            'sub_title' => 'AutoCAD, Revit, 3DS Max, Photoshop etc.',
            'image' => null,
            'description' => 'This Course is designed for those students studying Arch. or Related Field and Want to Learn AutoCAD 2020, 3DS Max, Revit Architecture Etc. , Photoshop or any other software. CADADDA is the only Autodesk Authorized Training Institute for AutoCAD 2020 training in Jodhpur.',
            'order' => 10,
            'status'=>true,
            'show_on_website' => true,
            'site_title' => 'AutoCAD for Architecture ( B.Arch/ Interior Course) Training Centre Jodhpur | CADADDA',
            'meta_keyword' => 'Arch AutoCAD Courses Jodhpur, AutoCAD Courses training Centre Jodhpur, AutoCAD Courses Institutes Jodhpur, AutoCAD for Architecture',
            'meta_description' => 'cadadda offers best AutoCAD for Architecture ( B.Arch/ Interior Course) for student located in Jodhpur/ rajasthan at affordable rate.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
      
        DB::table('course_categories')->insert([
            'name' => 'Nontech',
            'slug' => 'primavera-training-institute-jodhpur',
            'sub_title' => null,
            'image' => null,
            'description' => 'Nontech',
            'order' => 10,
            'status'=>true,
            'show_on_website' => true,
            'site_title' => 'AutoCAD Training Institute Jodhpur | Photoshop Certification Courses',
            'meta_keyword' => 'autocad training institute, 3Dmax trainer in jodhpur, cadd training centre, autocad diploma courses, 3ds max training institute, photoshop design',
            'meta_description' => 'CADADDA is an Autodesk ATC (Authorised Training Centre) which provides professional training in CAD / 3DSmax / 3Dmax / Interior / Photoshop.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
