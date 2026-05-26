<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatiereSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matieres')->insert([
            ['id' => 1, 'nom' => 'Algorithme et Programmation',  'volume_horaire' => 40, 'semestre' => 1, 'created_at' => '2024-04-13 13:43:46', 'updated_at' => '2024-04-13 13:43:48'],
            ['id' => 2, 'nom' => 'Algèbre 1',                    'volume_horaire' => 40, 'semestre' => 1, 'created_at' => '2024-04-13 13:45:06', 'updated_at' => '2024-04-13 13:45:08'],
            ['id' => 3, 'nom' => 'Analyse 1',                    'volume_horaire' => 40, 'semestre' => 1, 'created_at' => '2024-04-13 13:45:25', 'updated_at' => '2024-04-13 13:45:27'],
            ['id' => 4, 'nom' => 'Anglais 1',                    'volume_horaire' => 20, 'semestre' => 1, 'created_at' => '2024-04-13 13:46:06', 'updated_at' => '2024-04-13 13:46:09'],
            ['id' => 5, 'nom' => 'Recherche Documentaire',       'volume_horaire' => 20, 'semestre' => 1, 'created_at' => '2024-04-13 13:47:09', 'updated_at' => '2024-04-13 13:47:10'],
            ['id' => 6, 'nom' => 'Introduction à la sécurité',   'volume_horaire' => 40, 'semestre' => 4, 'created_at' => '2024-04-13 13:51:48', 'updated_at' => '2024-04-13 13:51:51'],
            ['id' => 7, 'nom' => 'Technologies XML',             'volume_horaire' => 40, 'semestre' => 4, 'created_at' => '2024-04-13 13:52:24', 'updated_at' => '2024-04-13 13:52:26'],
            ['id' => 8, 'nom' => 'Gestion De Projets',           'volume_horaire' => 20, 'semestre' => 4, 'created_at' => '2024-04-13 13:54:05', 'updated_at' => '2024-04-13 13:54:07'],
            ['id' => 9, 'nom' => 'Programmation Fonctionnelle',  'volume_horaire' => 40, 'semestre' => 5, 'created_at' => '2024-04-13 13:55:07', 'updated_at' => '2024-04-13 13:55:09'],
        ]);
    }
}
