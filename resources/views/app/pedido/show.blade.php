@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Itens do Pedido</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
            </ul>
        </div><br><br>


        <table style="width: 40%; margin: auto" class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">UF</th>
                <th scope="col">Email</th>

            </tr>
            @foreach($produtos_item as $produto_item)

                <tr>
                    <td>{{$produto_item->nome}}</td>
                    <td>{{$produto_item->descricao}}</td>
                    <td>{{$produto_item->peso}}</td>

                </tr>
            @endforeach
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

@endsection
