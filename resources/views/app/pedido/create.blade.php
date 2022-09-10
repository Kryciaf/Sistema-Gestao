@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Adicionar Pedido</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
            </ul>
        </div><br><br>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">

                <form action="{{route('pedido.store')}}" method="post">
                    @csrf
                    <select name="cliente_id" id="selectFornecedor">
                        <option value="">Selecione um Cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                        @endforeach
                    </select><br>
                    {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}<br><br>

                    <button class="btn btn-sucess" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
