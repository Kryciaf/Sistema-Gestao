{{$slot}}

<form action={{ route('site.contato') }} method="post">
    @csrf
    <div class="form-floating mb-3">
        <label for="floatingInput">Nome</label>
        <input name="nome" value="{{old('nome')}}" type="text" style="width: 80%; background-color: #6969a2;"
               class=" form-control">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}</div>

    <div class="form-floating mb-3">
        <label for="floatingInput">Telefone</label>
        <input name="telefone" value="{{old('telefone')}}" type="text" style="width: 80%; background-color: #6969a2;"
               class=" form-control">
        {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    </div>

    <div class="form-floating mb-3">
        <label for="floatingInput">Email</label>
        <input name="email" type="text" value="{{old('email')}}" style="width: 80%; background-color: #6969a2;"
               class=" form-control">
        {{$errors->has('email') ? $errors->first('email') : ''}}
    </div>

    <div class="form-floating mb-3">
        <select name="motivo_contatos_id" style="width: 80%; background-color: #6969a2;"
                class="{{$classe}} mt-2">
            <option value="">Qual o motivo do contato?</option>
            @foreach($motivo_contato as $key => $motivo)
                <option value="{{$motivo->id}}">{{$motivo->motivo_contato}}</option>
            @endforeach
        </select><br>
        {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    </div>

    <div class="form-floating mb-3">
        <label for="floatingInput">Preencha aqui sua mensagem</label>
    <textarea name="mensagem" style="width: 80%; background-color: #6969a2;" class="form-control"></textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    </div>

    <button type="submit" class="btn btn-success">ENVIAR</button>
</form>
