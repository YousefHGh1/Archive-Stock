<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            ['id' => 1, 'name' => 'units', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:10', 'updated_at' => '2023-03-09 00:04:10'],
            ['id' => 2, 'name' => 'categories', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:18', 'updated_at' => '2023-03-09 00:04:18'],
            ['id' => 3, 'name' => 'items', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:24', 'updated_at' => '2023-03-09 00:04:24'],
            ['id' => 4, 'name' => 'stores', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:31', 'updated_at' => '2023-03-09 00:04:31'],
            ['id' => 5, 'name' => 'suppliers', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:39', 'updated_at' => '2023-03-09 00:04:39'],
            ['id' => 9, 'name' => 'users', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:05:05', 'updated_at' => '2023-03-09 00:05:05'],
            ['id' => 10, 'name' => 'permissions', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:05:14', 'updated_at' => '2023-03-09 00:05:14'],
            ['id' => 11, 'name' => 'roles', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:05:21', 'updated_at' => '2023-03-09 00:05:21'],
            ['id' => 12, 'name' => 'diesels', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:05:33', 'updated_at' => '2023-03-09 00:05:33'],
            ['id' => 14, 'name' => 'archive', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:09:28', 'updated_at' => '2023-03-09 00:09:28'],
            ['id' => 15, 'name' => 'legal', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:09:35', 'updated_at' => '2023-03-09 00:09:35'],
            ['id' => 16, 'name' => 'computer', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:09:40', 'updated_at' => '2023-03-09 00:09:40'],
            ['id' => 17, 'name' => 'jibaya', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:09:46', 'updated_at' => '2023-03-09 00:09:46'],
            ['id' => 18, 'name' => 'censorship', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:09:51', 'updated_at' => '2023-03-09 00:09:51'],
            ['id' => 19, 'name' => 'admin', 'guard_name' => 'web', 'created_at' => '2023-03-09 15:02:14', 'updated_at' => '2023-03-09 15:02:14'],
            ['id' => 23, 'name' => 'report', 'guard_name' => 'web', 'created_at' => '2023-03-27 03:25:32', 'updated_at' => '2023-03-27 03:25:32'],
            ['id' => 24, 'name' => 'archivecore', 'guard_name' => 'web', 'created_at' => '2023-03-27 03:40:06', 'updated_at' => '2023-03-27 03:40:06'],
            ['id' => 25, 'name' => 'HR', 'guard_name' => 'web', 'created_at' => '2023-03-27 03:40:21', 'updated_at' => '2023-03-27 03:40:21'],
            ['id' => 26, 'name' => 'stock', 'guard_name' => 'web', 'created_at' => '2023-03-27 03:40:36', 'updated_at' => '2023-03-27 03:40:36'],
            ['id' => 27, 'name' => 'invoices', 'guard_name' => 'web', 'created_at' => '2023-03-27 03:49:47', 'updated_at' => '2023-03-27 03:49:47'],
            ['id' => 28, 'name' => 'types', 'guard_name' => 'web', 'created_at' => '2023-03-27 03:53:29', 'updated_at' => '2023-03-27 03:53:29'],
            ['id' => 29, 'name' => 'supplier_items', 'guard_name' => 'web', 'created_at' => '2023-03-27 03:54:46', 'updated_at' => '2023-03-27 03:54:46'],
            ['id' => 30, 'name' => 'invoice_exports', 'guard_name' => 'web', 'created_at' => '2023-03-29 03:43:21', 'updated_at' => '2023-03-29 03:43:21'],
            ['id' => 31, 'name' => 'custody', 'guard_name' => 'web', 'created_at' => '2023-04-10 03:14:13', 'updated_at' => '2023-04-10 03:14:13'],
            ['id' => 33, 'name' => 'currency', 'guard_name' => 'web', 'created_at' => '2023-05-03 02:24:28', 'updated_at' => '2023-05-03 02:24:28'],
            ['id' => 34, 'name' => 'court', 'guard_name' => 'web', 'created_at' => '2023-05-21 13:25:33', 'updated_at' => '2023-05-21 13:25:33'],
            ['id' => 37, 'name' => 'user_admin', 'guard_name' => 'web', 'created_at' => '2023-05-22 14:33:16', 'updated_at' => '2023-05-22 14:33:16'],
            ['id' => 38, 'name' => 'sections', 'guard_name' => 'web', 'created_at' => '2023-05-23 14:13:47', 'updated_at' => '2023-05-23 14:13:47'],
            ['id' => 39, 'name' => 'employee', 'guard_name' => 'web', 'created_at' => '2023-05-23 14:22:11', 'updated_at' => '2023-05-23 14:22:11'],
        ];
        
        DB::table('permissions')->insert($permissions);
        
    }
}