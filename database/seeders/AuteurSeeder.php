<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auteur;

class AuteurSeeder extends Seeder
{
    public function run(): void
    {
        Auteur::insert([
            ['nom' => 'Ahmed Ben Ali', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Sarah Trabelsi', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Karim Jendoubi', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Nadia Sassi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}