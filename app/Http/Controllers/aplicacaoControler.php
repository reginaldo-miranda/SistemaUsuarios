<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class aplicacaoControler extends Controller
{
    public function apresentarPaginaInicial(){
        // verifica sessao ativa
        if(!Session::has('login')){
            return redirect('/');
        }
        // apresenta a tela interior da aplicacao
        return view('aplicacao');
    }
}
