<?php

use Illuminate\Database\Seeder;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            'nome' => 'Sistema de alocacao de recursos',
            'estimativa_horas' => 200
        ]);
        DB::table('projetos')->insert([
            'nome' => 'Sistema de bibliotecas',
            'estimativa_horas' => 1000
        ]);
        DB::table('projetos')->insert([
            'nome' => 'Sistema de vendas',
            'estimativa_horas' => 2200
        ]);
        DB::table('projetos')->insert([
            'nome' => 'Novo sistema',
            'estimativa_horas' => 5200
        ]);
    }
}
