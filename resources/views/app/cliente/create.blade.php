@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Adicionar Cliente</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('cliente.index')}}">Voltar</a></li>
            </ul>
        </div>
        <br><br>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">

                <form action="{{route('cliente.store')}}" method="post">
                    @csrf

                    <div class="form-floating mb-3">
                        <label for="floatingInput">Nome</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="nome"
                               value="{{ old('nome') }}" class="floatingInput form-control">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingInput">Estado</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="estado"
                               value="{{ old('estado') }}" class="floatingInput form-control">
                        {{$errors->has('estado') ? $errors->first('estado') : ''}}
                    </div>

                    <button style="width: 80%;" type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection


