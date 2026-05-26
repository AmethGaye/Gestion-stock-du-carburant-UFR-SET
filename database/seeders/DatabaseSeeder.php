<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UfrSeeder::class,
            DepartementSeeder::class,
            FiliereSeeder::class,
            MatiereSeeder::class,
            MatiereFiliereSeeder::class,
            UserSeeder::class,
            VacataireSeeder::class,
            StockSeeder::class,
        ]);
    }
}
