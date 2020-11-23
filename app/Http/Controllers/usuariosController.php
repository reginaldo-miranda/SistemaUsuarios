<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuariosController extends Controller
{
    //--------------------------------------------
    public function index(){





        return $this->frmLogin();
    }
    //---------------------------------------


    //----------formulario login-------------------------
    // apresenta o formulario de login
    public function frmLogin(){
        return view('usuario_frm_login');
    }
    //------------executar login-------------------------
     public function execurtarLogin(Request $request){
        /* 1 verifacar das preenchidos validacao
           2 procurar na bd (enlouquente orm)
           3 comparar os dados digitado com bd (haching)
           4 passou os dados acima criar sessao usario
        */
        // 1 validacao

        $this->validate($request, [
          'text_usuario'=> 'required',
          'text_senha' => 'required'
        ]);
        return 'ok';
     }


    //--------------------------Recuperar senha --------------------

    public function frmRecupararSenha(){
        return view('usuario_frm_recuperar_senha');

    }
    
     public function executarRecuperarSenha(Request $request){
         // validacao
         $this->validate($request, [
             'text_email' => 'required|email'

         ]);
            return 'ok';
     }

     //--------------------------criar conta -------------------------------

     public function frmCriarNovaConta(){
            return view('usuario_frm_criar_conta');
     }

     public function executarCriarNovaConta(Request $request){
            // validacao dos campos

            $this->validate($request,[
              'text_usuario' => 'required|between:3,30|alpha_num',
              'text_senha' => 'required|between:6,15',
              'text_senha_repetida' => 'required|same:text_senha',
              'text_email' => 'required|email', 
              'check_termo_condicoes' => 'accepted'
            
            ]);
            return 'ok';
     }

}

