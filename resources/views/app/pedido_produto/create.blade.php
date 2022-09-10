@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Adicionar Produtos ao Pedido</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
            </ul>
        </div>
        <br><br>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto ; margin-top: 70px">

                <form action="{{route('pedido_produto.store', ['pedido' => $pedido->id])}}" method="post">
                    @csrf
                    <select name="produto_id" id="selectFornecedor">
                        <option value="">Selecione um Produto</option>
                        @foreach($produtos as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                        @endforeach
                    </select><br>
                    {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}<br><br>

                    <div class="form-floating mb-3">
                        <label for="floatingInput">Quantidade</label>
                    <input style="width: 80%; margin:auto; background-color: transparent;" type="number" name="quantidade"  class="floatingInput form-control">
                    {{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}
                    </div>
                    <button class="btn btn-sucess" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
