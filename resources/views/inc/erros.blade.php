{{-- apresentacao dos erros de validacao --}}
@if(count($errors)!=0)
    <div class="alert alert-danger">

        {{-- titulo de caixa de erros --}}
        @if(count($errors)==1)
            <p class="titulo-erro">Erro:</p>
        @else
        <p class="titulo-erro">Erros:</p>
        @endif

        {{-- apresentar erros concatenados --}}
        <ul>
            @foreach ($errors->all() as $erro)
                <li>
                    {{ $erro }}
                </li>
            @endforeach
                
        </ul>
    </div>
@endif

{{-- apresentacao de erro com o bd --}}
@if(isset($erros_bd))
    <div class="alert alert-danger">
        @foreach($erros_bd as $erro)
         <p>{{ $erro }}</p>
            
        @endforeach

    </div>
@endif