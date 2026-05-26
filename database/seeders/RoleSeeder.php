<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'nom' => 'admin',            'priorite' => 50, 'created_at' => '2024-04-22 23:30:01', 'updated_at' => '2024-04-22 23:30:03'],
            ['id' => 2, 'nom' => 'directeur',        'priorite' => 40, 'created_at' => '2024-04-22 23:30:24', 'updated_at' => '2024-04-22 23:30:27'],
            ['id' => 3, 'nom' => 'chef_departement', 'priorite' => 30, 'created_at' => '2024-04-22 23:31:00', 'updated_at' => '2024-04-22 23:31:02'],
            ['id' => 4, 'nom' => 'comptable',        'priorite' => 20, 'created_at' => '2024-04-22 23:32:37', 'updated_at' => '2024-04-22 23:32:39'],
            ['id' => 5, 'nom' => 'assistant',        'priorite' => 10, 'created_at' => '2024-04-22 23:32:55', 'updated_at' => '2024-04-22 23:32:57'],
        ]);
    }
}
