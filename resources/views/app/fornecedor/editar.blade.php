@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h2>Editar Fornecedor</h2>
        </div>

        <div class="menu2">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div><br><br>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">

                <form action="{{route('app.fornecedor.editar', $fornecedor->id)}}" method="post">
                    <input type="hidden" name="id" value="{{$fornecedor->id}}">
                    @csrf
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Nome</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="nome"
                               value="{{$fornecedor->nome ?? old('nome') }}" class="floatingInput form-control">
                        {{$errors->has('nome') ? $errors->first('nome') : ''}}
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingInput">Estado (UF)</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="text" name="uf"
                               value="{{$fornecedor->uf ?? old('uf') }}" class="floatingInput form-control">
                        {{$errors->has('uf') ? $errors->first('uf') : ''}}
                    </div>

                    <div class="form-floating mb-3">
                        <label for="floatingInput">Email</label>
                        <input style="width: 80%; margin:auto; background-color: transparent;" type="email" name="email"
                               value="{{$fornecedor->email ?? old('email') }}" class="floatingInput form-control">
                        {{$errors->has('email') ? $errors->first('email') : ''}}
                    </div>

                    <button class="btn btn-sucess" type="submit">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
