<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
@include('site.layouts._partials.topo') {{-- Já inclui em todas as seções o conteúdo dentro desse template --}}
@yield('conteudo') {{-- puxa a sessão da página principal pelo nome dado a ela --}}

</body>
</html>
