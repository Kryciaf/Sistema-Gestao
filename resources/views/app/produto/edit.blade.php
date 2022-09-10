@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Editar Produto {{$produto->nome}}</h2>
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
                <form method="post" action="{{route('produto.update', ['produto'=>$produto->id])}}">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <label for="floatingInput">Nome</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="nome"
                               value="{{$produto->nome ?? old('nome') }}" class="floatingInput form-control">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    </div>


                    <div class="form-floating mb-3">
                        <label for="floatingInput">Descrição</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text"
                               name="descricao" value="{{$produto->descricao ?? old('descricao') }}"
                               class="floatingInput form-control">
                        {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingInput">Peso</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="peso"
                               value="{{$produto->peso ?? old('peso') }}" class="floatingInput form-control">
                        {{$errors->has('peso') ? $errors->first('peso') : ''}}

                        <select name="fornecedor_id" id="selectFornecedor" class="mb-2 mt-4 form-floating mb-3">
                            <option value="">Selecione um Fornecedor</option>
                            @foreach($fornecedores as $fornecedor)
                                <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
                            @endforeach
                        </select><br>
                        {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}

                    </div>
                    <button class="btn btn-sucess" type="submit">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
