<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('sub_sections')->insert([

        //     ['id' => 120,'name' => 'البرمجة','section_id' => 12],
        //     ['id' => 120,'name' => 'البرمجة','section_id' => 12],
        // ]);

        $subSections = [
            [ 'name' => 'رئيس البلدية', 'section_id' => 1],
            [ 'name' => 'قسم سكرتارية رئيس البلدية', 'section_id' => 1],
            [ 'name' => 'سكرتارية المجلس البلدي', 'section_id' => 1],
            [ 'name' => 'المالية', 'section_id' => 2],
            [ 'name' => 'المشتريات', 'section_id' => 2],
            [ 'name' => 'المحاسبة', 'section_id' => 2],
            [ 'name' => 'الجباية', 'section_id' => 2],
            [ 'name' => 'الصندوق', 'section_id' => 2],
            [ 'name' => 'التدقيق', 'section_id' => 2],
            [ 'name' => 'الشؤون الإدارية و الموارد البشرية', 'section_id' => 3],
            [ 'name' => 'الموارد البشرية', 'section_id' => 3],
            [ 'name' => 'المستودعات-المخازن', 'section_id' => 3],
            [ 'name' => 'الأرشيف المركزي', 'section_id' => 3],
            [ 'name' => 'الخدمات الإدارية', 'section_id' => 3],
            [ 'name' => 'الصحة العامة و البيئة', 'section_id' => 4],
            [ 'name' => 'النفايات الصلبة', 'section_id' => 4],
            [ 'name' => 'الأسواق', 'section_id' => 4],
            [ 'name' => 'الرقابة و الصحة', 'section_id' => 4],
            [ 'name' => 'الورش و الكراج', 'section_id' => 4],
            [ 'name' => 'المياه و الصرف الصحي', 'section_id' => 5],
            [ 'name' => 'المياه', 'section_id' => 5],
            [ 'name' => 'الصرف الصحي', 'section_id' => 5],
            [ 'name' => 'التشغيل و الصيانة', 'section_id' => 5],
            [ 'name' => 'التخطيط و التنظيم', 'section_id' => 6],
            [ 'name' => 'التنظيم', 'section_id' => 6],
            [ 'name' => 'المساحة', 'section_id' => 6],
            [ 'name' => 'الحرف و الصناعات', 'section_id' => 6],
            [ 'name' => 'التخطيط الحظري', 'section_id' => 6],
            [ 'name' => 'GIS', 'section_id' => 6],
            [ 'name' => 'المشاريع', 'section_id' => 7],
            [ 'name' => 'الاشراف و التنفيذ', 'section_id' => 7],
            [ 'name' => 'الأشغال العامة', 'section_id' => 7],
            [ 'name' => 'اعداد المشاريع', 'section_id' => 7],
            [ 'name' => 'الانارة', 'section_id' => 7],
            [ 'name' => 'قلم الجمهور', 'section_id' => 8],
            [ 'name' => 'خدمات المشتركين', 'section_id' => 8],
            [ 'name' => 'الرقابة الداخلية', 'section_id' => 9],
            [ 'name' => 'الرقابة الادارية و المالية', 'section_id' => 9],
            [ 'name' => 'الرقابة الفنية', 'section_id' => 9],
            [ 'name' => 'الشؤون القانونية', 'section_id' => 10],
            [ 'name' => 'قلم المحكمة', 'section_id' => 10],
            [ 'name' => 'الأملاك و الايجارات', 'section_id' => 10],
            [ 'name' => 'القضايا و العقود', 'section_id' => 10],
            [ 'name' => 'العلاقات العامة و التعاون الدولي', 'section_id' => 11],
            [ 'name' => 'العلاقات العامة', 'section_id' => 11],
            [ 'name' => 'التعاون الدولي', 'section_id' => 11],
            [ 'name' => 'المرأة والطفل', 'section_id' => 11],
            [ 'name' => 'الحاسوب', 'section_id' => 12],
            [ 'name' => 'البرمجة', 'section_id' => 12],
            [ 'name' => 'الشبكات', 'section_id' => 12],
            [ 'name' => 'السداد الآلي', 'section_id' => 2],
            [ 'name' => 'الطرق والانشاءات', 'section_id' => 7],
            [ 'name' => 'مساعد إداري', 'section_id' => 10],
            [ 'name' => 'مدير البلدية', 'section_id' => 13],
            [ 'name' => 'سكرتارية المدير', 'section_id' => 13],
            [ 'name' => 'شرطة البلدية', 'section_id' => 14],
            [ 'name' => 'التفتيش و المتابعة مياه', 'section_id' => 2],
            [ 'name' => 'الصيانة والتشغيل', 'section_id' => 5],
            [ 'name' => 'الادارة', 'section_id' => 15],
        ];

        DB::table('sub_sections')->insert($subSections);
    }
}