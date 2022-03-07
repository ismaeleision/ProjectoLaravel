<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nombre' => "Concierto"]);
        DB::table('categorias')->insert(['nombre' => "Torneo Regional"]);
        DB::table('categorias')->insert(['nombre' => "Torneo Nacional"]);
        DB::table('categorias')->insert(['nombre' => "Competicion Deportiva"]);
        DB::table('categorias')->insert(['nombre' => "Debate"]);
    }
}
