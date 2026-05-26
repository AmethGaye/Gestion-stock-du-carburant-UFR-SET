<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stocks')->insert([
            [
                'id'                    => 1,
                'volume'                => 3000,
                'prix_unitaire'         => 800.00,
                'prix_total'            => 10000,
                'nombre_ticket'         => 300,
                'entrees'               => 300,
                'tickets_apres_entrees' => 300,
                'sorties'               => 0,
                'created_at'            => '2024-05-05 00:09:49',
                'updated_at'            => '2024-05-05 00:09:52',
            ],
        ]);
    }
}
