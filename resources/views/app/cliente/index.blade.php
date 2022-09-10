@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Clientes</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('cliente.create')}}">Novo</a></li>
            </ul>
        </div><br><br>

        <div class="informacao-pagina">
            <div style="width: 50%; margin-left: auto; margin-right: auto">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID do Cliente</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->estado}}</td>
                            <td><a href="{{route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>

                            <td>
                                <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
