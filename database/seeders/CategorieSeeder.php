<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        Categorie::insert([
            ['nom' => 'Technologie', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Sport', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Culture', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Économie', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Santé', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}