@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Pedidos</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li>
            </ul>
        </div><br><br>

        <div class="informacao-pagina">
            <div style="width: 50%; margin-left: auto; margin-right: auto">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID do Pedido</th>
                        <th scope="col">Cliente</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id}}</td>
                            <td>{{$pedido->cliente_id}}</td>
                            <td><a href="{{ route('pedido_produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produtos</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
