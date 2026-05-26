<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departements')->insert([
            ['id' => 1, 'nom' => 'INFORMATIQUE',              'ufr_id' => 1, 'created_at' => '2024-04-13 12:28:21', 'updated_at' => '2024-04-13 12:28:43'],
            ['id' => 2, 'nom' => 'PHYSIQUE-CHIMIE',           'ufr_id' => 1, 'created_at' => '2024-04-13 12:28:33', 'updated_at' => '2024-04-13 12:28:47'],
            ['id' => 3, 'nom' => 'HYDROSCIENCE',              'ufr_id' => 1, 'created_at' => '2024-04-13 12:28:36', 'updated_at' => '2024-04-13 12:28:50'],
            ['id' => 4, 'nom' => 'MATHEMATIQUE INFORMATIQUE', 'ufr_id' => 1, 'created_at' => '2024-04-13 12:28:40', 'updated_at' => '2024-04-13 12:28:53'],
        ]);
    }
}
