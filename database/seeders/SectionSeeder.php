<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sections = [
            ['num_section' => 1, 'name_section' => 'مكتب رئيس البلدية', 'created_at' => '2023-03-13 17:27:28', 'updated_at' => '2023-03-13 17:27:28'],
            ['num_section' => 2, 'name_section' => 'المالية', 'created_at' => '2023-03-13 17:36:50', 'updated_at' => '2023-03-13 17:36:50'],
            ['num_section' => 3, 'name_section' => 'الشؤون الإدارية و الموارد البشرية', 'created_at' => '2023-03-13 17:38:50', 'updated_at' => '2023-03-13 17:38:50'],
            ['num_section' => 4, 'name_section' => 'الصحة العامة و البيئة', 'created_at' => '2023-03-13 17:39:12', 'updated_at' => '2023-03-13 17:39:12'],
            ['num_section' => 5, 'name_section' => 'المياه والصرف الصحي', 'created_at' => '2023-03-13 17:40:12', 'updated_at' => '2023-03-13 17:40:12'],
            ['num_section' => 6, 'name_section' => 'التخطيط و التنظيم', 'created_at' => '2023-03-13 17:40:29', 'updated_at' => '2023-03-13 17:40:29'],
            ['num_section' => 7, 'name_section' => 'المشاريع', 'created_at' => '2023-03-13 17:40:40', 'updated_at' => '2023-03-13 17:40:40'],
            ['num_section' => 8, 'name_section' => 'قلم الجمهور', 'created_at' => '2023-03-13 17:40:53', 'updated_at' => '2023-03-13 17:40:53'],
            ['num_section' => 9, 'name_section' => 'الرقابة الداخلية', 'created_at' => '2023-03-13 17:41:12', 'updated_at' => '2023-03-13 17:41:12'],
            ['num_section' => 10, 'name_section' => 'الشؤون القانونية', 'created_at' => '2023-03-13 17:41:30', 'updated_at' => '2023-03-13 17:41:30'],
            ['num_section' => 11, 'name_section' => 'العلاقات العامة و التعاون الدولي', 'created_at' => '2023-03-13 17:41:45', 'updated_at' => '2023-03-13 17:41:45'],
            ['num_section' => 2301, 'name_section' => 'الحاسوب', 'created_at' => '2023-03-13 17:41:55', 'updated_at' => '2023-03-13 17:41:55'],
            ['num_section' => 13, 'name_section' => 'مدير البلدية', 'created_at' => '2023-03-24 12:12:26', 'updated_at' => '2023-03-24 12:12:26'],
            ['num_section' => 0, 'name_section' => 'دوائر خارجية', 'created_at' => '2023-05-23 14:00:09', 'updated_at' => '2023-05-23 14:00:09'],
            ['num_section' => 14, 'name_section' => 'الادارة', 'created_at' => '2023-06-04 14:56:58', 'updated_at' => '2023-06-04 14:56:58'],
        ];
        
        DB::table('sections')->insert($sections);
        
    }
}