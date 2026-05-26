<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacataireSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vacataires')->insert([
            [
                'id'         => 1,
                'nom'        => 'Mbaye',
                'prenom'     => 'Seny',
                'email'      => 'senyMbaye@gmail.com',
                'telephone'  => '773424532',
                'provenance' => 'Thiès',
                'origine'    => 'Thiès',
                'situation'  => '1',
                'status'     => 1,
                'ufr_id'     => 1,
                'sexe'       => 'Masculin',
                'created_at' => '2024-04-22 23:50:59',
                'updated_at' => '2024-04-22 23:50:59',
            ],
        ]);
    }
}
