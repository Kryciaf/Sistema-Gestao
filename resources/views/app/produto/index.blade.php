@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Produtos</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
            </ul>
        </div><br><br>

        <div class="informacao-pagina">
            <div style="width: 40%; margin-left: auto; margin-right: auto">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->fornecedor->nome}}</td>
                            <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                            <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>

                            <td>
                                <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
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
