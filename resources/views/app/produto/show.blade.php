@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Produto</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li>Consulta</li>
            </ul>
        </div>
        <br><br>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <div style="font-size: 25px;margin-bottom: 20px">Detalhes do Produto {{$produto->nome}}</div>
                <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td>{{$produto->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td>{{$produto->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{$produto->peso}} g</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
