<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/desenvolvedor-projetos', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();
    foreach($desenvolvedores as $d) {
        echo '<p>Nome do desenvolvedor: ' . $d->nome . '</p>';
        echo '<p>Cargo do desenvolvedor: ' . $d->cargo . '</p>';
        if(count($d->projetos) > 0) {
            echo '<p>Projetos: <br />';
            echo '<ul>';
            foreach($d->projetos as $p) {
                echo "<li>";
                echo "Nome: " . $p->nome . " | ";
                echo "Horas: " . $p->estimativa_horas . " | ";
                echo "Horas trabalhadas: " . $p->pivot->horas_semanais;
                echo "</li>";
            }
            echo '</ul>';
        }
        echo "<hr>";
    }
});

Route::get('/projetos-desenvolvedor', function() {
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach ($projetos as $proj) {
        echo '<p>Nome do projeto: ' . $proj->nome . '</p>';
        echo '<p>Estimativa de horas: ' . $proj->estimativa_horas . '</p>';
        if(count($proj->desenvolvedores) > 0) {
            echo '<p>Desenvolvedores: <br />';
            echo '<ul>';
            foreach ($proj->desenvolvedores as $devs) {
                echo '<li>';
                echo 'Nome: ' . $devs->nome . " | ";
                echo 'Cargo: ' . $devs->cargo . " | ";
                echo 'Horas trabalhadas: ' . $devs->pivot->horas_semanais;
            }
            echo '</ul>';
        }
        echo '<hr />';
    }


//  return $projetos->toJson();
});
