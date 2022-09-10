@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Fornecedores</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <br><br>

        <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto">

                <table style="width: 70%; margin: auto" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">UF</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{$fornecedor->nome}}</td>
                            <td>{{$fornecedor->uf}}</td>
                            <td>{{$fornecedor->email}}</td>
                            <td><a href="{{route('app.fornecedor.show', [$fornecedor->id])}}"
                                   title="Produtos Disponíveis no Fornecedor {{$fornecedor->nome}}">Lista de Produtos</a></td>
                            <td><a href="{{route('app.fornecedor.editar', [$fornecedor->id])}}"
                                   title="Editar Fornecedor {{$fornecedor->nome}}">Editar</a></td>
                            <td><a href="{{route('app.fornecedor.excluir', [$fornecedor->id])}}"
                                   title="Excluir Fornecedor {{$fornecedor->nome}}">Excluir</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
