<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['id' => 2, 'name' => 'admin', 'guard_name' => 'web', 'created_at' => '2023-03-09 17:48:35', 'updated_at' => '2023-03-09 17:48:35'],
            ['id' => 3, 'name' => 'archive', 'guard_name' => 'web', 'created_at' => '2023-03-09 18:13:10', 'updated_at' => '2023-03-09 18:13:10'],
            ['id' => 5, 'name' => 'stock', 'guard_name' => 'web', 'created_at' => '2023-03-16 02:45:32', 'updated_at' => '2023-03-16 02:45:32'],
            ['id' => 6, 'name' => 'Super-User', 'guard_name' => 'web', 'created_at' => '2023-03-16 03:23:28', 'updated_at' => '2023-03-16 03:23:28'],
            ['id' => 7, 'name' => 'legal', 'guard_name' => 'web', 'created_at' => '2023-05-07 23:52:55', 'updated_at' => '2023-05-07 23:52:55'],
            ['id' => 8, 'name' => 'computer', 'guard_name' => 'web', 'created_at' => '2023-05-07 23:53:07', 'updated_at' => '2023-05-07 23:53:07'],
            ['id' => 9, 'name' => 'jibaya', 'guard_name' => 'web', 'created_at' => '2023-05-07 23:53:19', 'updated_at' => '2023-05-07 23:53:19'],
            ['id' => 10, 'name' => 'censorship', 'guard_name' => 'web', 'created_at' => '2023-05-07 23:53:36', 'updated_at' => '2023-05-07 23:53:36'],
            ['id' => 12, 'name' => 'users', 'guard_name' => 'web', 'created_at' => '2023-05-22 14:26:31', 'updated_at' => '2023-05-22 14:26:31'],
        ];
        
        DB::table('roles')->insert($roles);
        
    }
}