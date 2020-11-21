@extends('layouts.app')

{{-- formulario de recuperar senha --}}

@section('conteudo')

   <div class="row"> 
  
    <div class="col-md-4 col-md-4 offset-4 col-sm-8 offset-2 col-xs-12">
      {{-- apresentacao de erros de validacao --}}



      {{-------------------------------------------------------------}}

         <form method="POST" action="">

             {{ csrf_field() }}
         
            <div class="form-group">
                <label for="id_text_email">Email</label>
                <input type="text" class="form-control" id="id_text_email" name="id_text_email" placeholder="Email:">
            </div>

             <div class="text-center">
                  <button type="submit" class="btn btn-primary">Recuperar senha</button>
             </div>
            
                 {{-- voltar ao inicio --}}
             <div class="text-center margin-top-20">

               <a href="#">Voltar ao inicio</a>
             </div> 
         
         </form>

      <div>

    </div>

@endsection