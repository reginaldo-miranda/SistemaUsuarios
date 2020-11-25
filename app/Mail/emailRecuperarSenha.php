<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class emailRecuperarSenha extends Mailable
{
    use Queueable, SerializesModels;
    protected $nova_senha;

   //----------------------------------------------------

    public function __construct($nova_senha)
    {
        $this->nova_senha = $nova_senha;
    }

    //----------------------------------------------------

    public function build()
    {
        $senha_nova = ['senha_nova', $this->nova_senha];
       // return $this->view('emails.emailRecuperarSenha', compact('senha_nova'));
       return $this->view('emails.emailRecuperarSenha')->with(['nova_senha' =>$this->nova_senha]);

       // ---------------------outro jeito de enviar a senha para o formulario

      //  opcao 1  $dados = ['nova_senha'->$this->nova_senha];
       // opcao 1 return $this->view('emails.emailRecuperarSenha', compact($'dados'));

       // ---------------tudo em uma unica linha ----------------
       // opcao 2 return $this->view('emails.emailRecuperarSenha')->with(['nova_senha' =>$this->nova_senha]);
    }
}
