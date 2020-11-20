@extends('layouts.app')

@section('conteudo')

   <div class="row"> 
  
    <div class="col-md-4 col-md-4 offset-4 col-sm-8 offset-2 col-xs-12">
      
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

             <div class="text-center">
                  <button type="submit" class="btn btn-primary">Entrar</button>
             </div>
               
             <div class="text-center margin-top-20">
               <a href="#">Recuperar senha</a>
             </div>  

             <div class="text-center">
               <a href="#">Criar nova conta</a>
             </div> 
         
         </form>

      <div>

    </div>

@endsection