<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genero::insert([
            ["name" => "Drama"],
            ["name" => "Terror"],
            ["name" => "Romantico"],
            ["name" => "Anime"],
            ["name" => "Historico"],
            ["name" => "Comedia"],
            ["name" => "Accion"],
            ["name" => "Misterio"],
            ["name" => "Porno"]
        ]);
    }
}
