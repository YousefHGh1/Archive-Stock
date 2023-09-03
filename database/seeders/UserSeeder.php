<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'name' => '2301',
            'email' => 'yousef@app.com',
            'password' => Hash::make('2301'),
            'section_id' => 1,
            'sub_section_id' => 1,
            'employee_name' => 'yousef',
        ]);

        DB::table('users')->insert([
            'name' => '1105',
            'email' => '1105@app.com',
            'password' => Hash::make('1105'),
            'section_id' => 1,
            'sub_section_id' => 1,
            'employee_name' => 'هشام يوسف الحفني غنيم',
        ]);

    }
}