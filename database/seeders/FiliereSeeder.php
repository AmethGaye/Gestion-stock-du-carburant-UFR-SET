<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('filieres')->insert([
            ['id' => 1, 'nom' => 'Génie Informatique',         'departement_id' => 1, 'created_at' => '2024-04-13 13:26:02', 'updated_at' => '2024-04-13 13:26:04'],
            ['id' => 2, 'nom' => 'LSEE',                       'departement_id' => 3, 'created_at' => '2024-04-13 13:26:39', 'updated_at' => '2024-04-13 13:26:41'],
            ['id' => 3, 'nom' => 'Physique Chimie',            'departement_id' => 2, 'created_at' => '2024-04-13 13:29:17', 'updated_at' => '2024-04-13 13:29:19'],
            ['id' => 4, 'nom' => 'Mathématique Informatique',  'departement_id' => 4, 'created_at' => '2024-04-13 13:30:17', 'updated_at' => '2024-04-13 13:30:20'],
        ]);
    }
}
