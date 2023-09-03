<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert([
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 1],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 3],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 2],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 4],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 36],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 38],
            ['role_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 65],
            ['role_id' => 5, 'model_type' => 'App\Models\User', 'model_id' => 37],
            ['role_id' => 5, 'model_type' => 'App\Models\User', 'model_id' => 38],
            ['role_id' => 5, 'model_type' => 'App\Models\User', 'model_id' => 71],
            ['role_id' => 6, 'model_type' => 'App\Models\User', 'model_id' => 20],
            ['role_id' => 10, 'model_type' => 'App\Models\User', 'model_id' => 26],
            ['role_id' => 12, 'model_type' => 'App\Models\User', 'model_id' => 37],
        ]);
    }
    
}