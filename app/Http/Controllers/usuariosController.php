<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
use App\classes\minhaClasse;
use App\Mail\emailRecuperarSenha;

class usuariosController extends Controller
{
    //--------------------------------------------
    public function index(){
      // verificar se existe sessao
      if(!Session::has('login')){
        // senao existe apresenta frm login
        return $this->frmLogin();
      }else{
        return view('aplicacao');
      }

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

          // verificar se usuario existe
          $usuario = usuarios::where('usuario',$request->text_usuario)->get();
             // if(count($usuario)==0){
             if($usuario->count()==0){
                $erros_bd = ['essa conta de usuario nao existe'];
                return view('usuario_frm_login', compact('erros_bd'));
             }
          $usuario = usuarios::where('usuario',$request->text_usuario)->first();
          //  verificar a senha
            if(!Hash::check($request->text_senha, $usuario->senha)){
              $erros_bd = ['essa senha de usuario nao existe'];
              return view('usuario_frm_login', compact('erros_bd'));

            }
            Session::put('login','sim');
            Session::put('usuario', $usuario->usuario);


            return redirect('/');
            
        }

    //--------------------------logout -----------------------------
      public function logout(){
       // destruir a sessao e redirecionar para login

       //destruir sessao
       Session::flush();
       return redirect('/');

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

         // vai buscar o usuario da seenha correspondente
         $usuario = usuarios::where('email',$request->text_email)->get();
         if($usuario->count()==0){
            $erros_bd = ['o email nao esta cadastrado'];
            return view('usuario_frm_recuperar_senha', compact('erros_bd'));

         }
          //atualizar a senha para nova senha  (recuperar)    
          $usuario = $usuario->first();
          // criar uma nova senha aleatoria
          $nova_senha = minhaClasse::criarCodigo();
          $usuario->senha = Hash::make($nova_senha);
          $usuario->save();

          Mail::to($ususrios->email)->send(new emailRecuperarSenha($nova_senha));

         /*
         1 ter um susuario com email valido
         2 verificar se o email inserido corresponde a do usuario
         3 criar senha aleatoria
         3a registrar alterar a senha na bd
         4 envia email com a nova senha para o email do usuario
         5 informar em uma viw o usuario q foi enviado a senha

         //$2y$10$Lr2gA9enmqjJJd6XN0799.EhCZmJRh.ptqsredXqyb3Rl1d3VmJ8m
         //$2y$10$ZTgR9k/Cfj51vBUQWFmxFOYsvotHcPLGu0iqvfJFpOUKU6RNSNPRe
         // HyYjgGqYZ6

         */ $nova_senha = minhaClasse::criarCodigo();
            return $nova_senha;
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
            // ---------------------------------------
            // verifica se ja existe o mesmo nome e o mesmo email
            $dados = usuarios::where('usuario', "=" ,$request->text_usuario)
                              ->orwhere('email', "=" ,$request->text_email)
                              ->get();
                              
                if($dados->count()!=0){
                    $erros_bd = ['ja existe um usuario com o mesmo nome ou com o mesmo email'];
                    return view('usuario_frm_criar_conta', compact('erros_bd'));
                }
                //-------------inseirir usuario na bd ------------
                   $novo = new usuarios;
                   $novo->usuario = $request->text_usuario;
                   $novo->senha = Hash::make($request->text_senha);
                   $novo->email = $request->text_email;
                   $novo->save();   
                          
                   return redirect('/');
     }

}

