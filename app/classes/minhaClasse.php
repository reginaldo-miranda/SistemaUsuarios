<?php
namespace App\classes;
 
    class minhaClasse{
      public static function criarCodigo(){
        //  criar codigo aleatorio para senha com 10 caracteres
        $valor = '';
        $caracteres = 'abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!?#$%';
        for($m=0; $m<10; $m++){
            $index = rand(0,strlen($caracteres));
            $valor .= substr($caracteres, $index,1);  
        }
        return $valor;    
      }



    }


?>