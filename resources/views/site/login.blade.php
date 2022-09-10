@extends('site.layouts/basico') {{-- O extends vai direto para a pasta views, somente puxa a outra view, sem informar nada além --}}

@section('titulo', 'Contato')
@section('conteudo')  {{-- A section vai indicar o 'pedaço de código' que será adicionado no yield do template --}}

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h2>Login</h2>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
            <form action="{{ route('site.login') }}" method="post">
                @csrf

                <div class="form-floating mb-3">
                    <input name="usuario" type="text" value="{{old('usuario')}}"
                           style="width: 80%; margin: auto; background-color: transparent;" placeholder="Usuário"
                           class="form-control">
                    @if ($errors->has('usuario'))
                        <span style="color: #6969a2" class="text">{{ $errors->first('usuario') }}</span>
                    @endif

                </div>

                <div class="form-floating mb-3">
                    <input name="senha" type="password" value="{{old('senha')}}"
                           style="width: 80%; margin: auto; background-color: transparent;" placeholder="Senha"
                           class="form-control">
                    @if ($errors->has('senha'))
                        <span style="color: #6969a2" class="text">{{ $errors->first('senha') }}</span>
                    @endif

                </div>

                <button type="submit" class="mb-3 btn btn-success">Acessar</button>
            </form>

            <span style="color: #6969a2; font-size: 18px;" class="text">{{isset($erro) && $erro != '' ? $erro : ''}}</span>
        </div>
    </div>
</div>

@endsection

