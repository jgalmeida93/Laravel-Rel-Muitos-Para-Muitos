<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'desenvolvedores';

    // Um desenvolvedor pode pertencer a vários projetos
    function projetos() {
        return $this->belongsToMany('App\Projeto', 'alocacoes'); // <- (Modelo, nome da tabela do relacionamento entre desenvolvedor e projeto) 
    }

}
