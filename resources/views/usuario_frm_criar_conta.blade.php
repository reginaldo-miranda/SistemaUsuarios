@extends('layouts.app')

{{-- formulario de criar conta --}}

@section('conteudo')

   <div class="row"> 
  
    <div class="col-md-4 col-md-4 offset-4 col-sm-8 offset-2 col-xs-12">
      {{-- apresentacao de erros de validacao --}}



      {{-------------------------------------------------------------}}

         <form method="POST" action="">

             {{ csrf_field() }}
             <div class="form-group">
               <label for="id_text_usuario">Usuario</label> 
               <input type="text" class="form-control" id="id_text_usuario" name="id_text_usuario" placeholder="usuario:">   
             </div>

              <div class="form-group">
               <label for="id_text_senha">senha</label> 
               <input type="password" class="form-control" id="id_text_senha" name="id_text_senha" placeholder="senha:">   
             </div>

             <div class="form-group">
                 <label for="id_text_senha_repetida">Repetir senha</label>
                 <input type="password" class="form-control" id="id_text_senha_repetida" name="id_text_senha_repetida" placeholder="Repetir senha:">
             </div>

            <div class="form-group">
                <label for="id_text_email">Email</label>
                <input type="text" class="form-control" id="id_text_email" name="id_text_email" placeholder="Email:">
            </div>

            <div class="form-group text-center">
               <input type="checkbox" id="id_check_termo_condicoes" name="id_check_termo_condicoes" value="1"> 
               <label for="id_check_termo_condicoes"> Concordo com os termos e condições</label>

            </div>


             <div class="text-center">
                  <button type="submit" class="btn btn-primary">Criar nova conta</button>
             </div>
            
                 {{-- voltar ao inicio --}}
             <div class="text-center margin-top-20">

               <a href="/">Voltar ao inicio</a>
             </div> 
         
         </form>

      <div>

    </div>

@endsection