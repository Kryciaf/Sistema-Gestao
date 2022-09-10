@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Produto do Fornecedor {{$fornecedor->nome}}</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('app.fornecedor')}}">Voltar</a></li>
            </ul>
        </div>
        <br><br>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                        </tr>
                        </thead>
                        @foreach($produtos as $produto )
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}} g</td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@endsection
