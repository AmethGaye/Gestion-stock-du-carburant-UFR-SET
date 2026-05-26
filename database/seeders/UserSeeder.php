<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $hash = bcrypt('password');

        DB::table('users')->insert([
            [
                'id'            => 1,
                'nom'           => 'thiam',
                'prenom'        => 'Mouhamad',
                'date_naiss'    => '2000-11-18',
                'telephone'     => '766022134',
                'status'        => 1,
                'email'         => 'thiam@univ-thies.sn',
                'role_id'       => 2,
                'password'      => $hash,
                'ufr_id'        => 1,
                'departement_id'=> null,
                'sexe'          => 'Masculin',
                'created_at'    => '2024-05-05 00:01:09',
                'updated_at'    => '2024-05-05 00:01:12',
            ],
            [
                'id'            => 2,
                'nom'           => 'gaye',
                'prenom'        => 'idrissa',
                'date_naiss'    => '2000-11-18',
                'telephone'     => '776739773',
                'status'        => 1,
                'email'         => 'gaye@univ-thies.sn',
                'role_id'       => 3,
                'password'      => $hash,
                'ufr_id'        => 1,
                'departement_id'=> 1,
                'sexe'          => 'Masculin',
                'created_at'    => '2024-05-05 00:07:48',
                'updated_at'    => '2024-05-05 00:07:56',
            ],
            [
                'id'            => 3,
                'nom'           => 'diop',
                'prenom'        => 'khady',
                'date_naiss'    => '2000-11-18',
                'telephone'     => '776739775',
                'status'        => 1,
                'email'         => 'diop@univ-thies.sn',
                'role_id'       => 4,
                'password'      => $hash,
                'ufr_id'        => 1,
                'departement_id'=> null,
                'sexe'          => 'Feminin',
                'created_at'    => '2024-05-05 00:07:51',
                'updated_at'    => '2024-05-05 00:07:59',
            ],
            [
                'id'            => 4,
                'nom'           => 'seck',
                'prenom'        => 'fatou',
                'date_naiss'    => '2000-11-18',
                'telephone'     => '776739776',
                'status'        => 1,
                'email'         => 'seck@univ-thies.sn',
                'role_id'       => 5,
                'password'      => $hash,
                'ufr_id'        => 1,
                'departement_id'=> 1,
                'sexe'          => 'Feminin',
                'created_at'    => '2024-05-05 00:07:53',
                'updated_at'    => '2024-05-05 00:08:00',
            ],
            [
                'id'            => 5,
                'nom'           => 'mouhamad',
                'prenom'        => 'gaye',
                'date_naiss'    => '2024-05-05',
                'telephone'     => '776739777',
                'status'        => 1,
                'email'         => 'mouhamad.gaye@univ-thies.sn',
                'role_id'       => 1,
                'password'      => $hash,
                'ufr_id'        => 1,
                'departement_id'=> null,
                'sexe'          => 'Masculin',
                'created_at'    => '2024-05-05 00:07:54',
                'updated_at'    => '2024-05-05 00:08:02',
            ],
        ]);
    }
}
