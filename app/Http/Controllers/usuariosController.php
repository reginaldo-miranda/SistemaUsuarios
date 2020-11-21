<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuariosController extends Controller
{
    //--------------------------------------------
    public function index(){
        return view('usuario_frm_login');
    }
    //---------------------------------------

    public function frmRecupararSenha(){
        return view('usuario_frm_recuperar_senha');

    }
     //---------------------------------------
     public function executarRecuperarSenha(){

     }

     //---------------------------------------

     public function frmCriarNovaConta(){
            return view('usuario_frm_criar_conta');
     }

     public function executarCriarNovaConta(){


     }

}

