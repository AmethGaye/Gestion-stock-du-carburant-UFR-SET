<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfrSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ufrs')->insert([
            ['id' => 1, 'nom' => 'SET'],
            ['id' => 2, 'nom' => 'SES'],
        ]);
    }
}
