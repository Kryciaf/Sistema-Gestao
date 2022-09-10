@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Editar Cliente {{$cliente->nome}}</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('cliente.index')}}">Voltar</a></li>
            </ul>
        </div>
        <br><br>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">

                <form method="post" action="{{route('cliente.update', ['cliente'=>$cliente->id])}}">
                    <input type="hidden" name="id" value="{{$cliente->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Nome</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="nome"
                               value="{{$cliente->nome ?? old('nome') }}" class="floatingInput form-control">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    </div>


                    <div class="form-floating mb-3">
                        <label for="floatingInput">Estado (UF)</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="uf"
                               value="{{$cliente->estado ?? old('uf') }}" class="floatingInput form-control">
                        {{$errors->has('uf') ? $errors->first('uf') : ''}}
                    </div>

                    <button class="btn btn-sucess" type="submit">Editar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
