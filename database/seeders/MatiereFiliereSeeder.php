<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatiereFiliereSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matieres_filieres')->insert([
            ['id' =>  1, 'matiere_id' => 1, 'filiere_id' => 1, 'created_at' => '2024-04-18 04:58:59', 'updated_at' => '2024-04-18 04:59:08'],
            ['id' =>  3, 'matiere_id' => 3, 'filiere_id' => 1, 'created_at' => '2024-04-18 04:59:15', 'updated_at' => '2024-04-18 04:59:17'],
            ['id' =>  4, 'matiere_id' => 4, 'filiere_id' => 1, 'created_at' => '2024-04-18 04:59:19', 'updated_at' => '2024-04-18 04:59:20'],
            ['id' =>  5, 'matiere_id' => 7, 'filiere_id' => 1, 'created_at' => '2024-04-18 04:59:22', 'updated_at' => '2024-04-18 04:59:24'],
            ['id' =>  6, 'matiere_id' => 9, 'filiere_id' => 1, 'created_at' => '2024-04-18 04:59:26', 'updated_at' => '2024-04-18 04:59:28'],
            ['id' =>  7, 'matiere_id' => 2, 'filiere_id' => 3, 'created_at' => '2024-04-22 04:36:30', 'updated_at' => '2024-04-22 04:36:26'],
            ['id' =>  8, 'matiere_id' => 3, 'filiere_id' => 3, 'created_at' => '2024-04-22 04:36:32', 'updated_at' => '2024-04-22 04:36:34'],
            ['id' =>  9, 'matiere_id' => 4, 'filiere_id' => 3, 'created_at' => '2024-04-22 04:36:37', 'updated_at' => '2024-04-22 04:36:36'],
            ['id' => 10, 'matiere_id' => 5, 'filiere_id' => 3, 'created_at' => '2024-04-22 04:36:39', 'updated_at' => '2024-04-22 04:36:41'],
            ['id' => 11, 'matiere_id' => 1, 'filiere_id' => 2, 'created_at' => '2024-04-22 22:06:42', 'updated_at' => '2024-04-22 22:06:44'],
        ]);
    }
}
