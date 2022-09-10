@extends('site.layouts/basico') {{-- O extends vai direto para a pasta views, somente puxa a outra view, sem informar nada além --}}

@section('titulo', 'Home')
@section('conteudo')  {{-- A section vai indicar o 'pedaço de código' que será adicionado no yield do template --}}

<div class="conteudo-destaque">
    <div class="esquerda">
        <div class="informacoes">

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            {{ $error }}
                        </div>
                    </div>
                @endforeach
            @endif

                <h2>Sistema Super Gestão</h2>
            <p>Software para gestão empresarial ideal para sua empresa.<p>
            <div class="chamada">
                <img src="{{asset('/img/check.png')}}">
                <span class="texto-branco">Gestão completa e descomplicada</span>
            </div>
            <div class="chamada">
                <img src="{{asset('/img/check.png')}}">
                <span class="texto-branco">Sua empresa na nuvem</span>
            </div>
        </div>

        <div class="video">
            <img src="{{asset('/img/player_video.jpg')}}">
        </div>
    </div>

    <div class="direita">
        <div class="contato">
            <h2>Contato</h2>
            <p style="width: 80%">Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>

            @component('site.layouts._components.form_contato', ['classe' => 'borda-branca', 'motivo_contato' => $motivo_contato])
            @endcomponent

        </div>
    </div>
</div>
@endsection
