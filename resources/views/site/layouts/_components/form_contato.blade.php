{{ $slot }}

<form action={{ route('site.contato') }} method="post">
    @csrf

    {{ ($errors->has('nome')) ?  $errors->first('nome') : ''}}
    <input name="nome" value="{{ old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>

    {{ ($errors->has('telefone')) ?  $errors->first('telefone') : ''}}
    <input name="telefone" value="{{ old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>

    {{ ($errors->has('email')) ?  $errors->first('email') : ''}}
    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>

    {{-- {{ print_r($motivo_contatos) }} --}}

    {{ ($errors->has('motivo_contatos_id')) ?  $errors->first('motivo_contatos_id') : ''}}
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
        {{-- <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : ''}}>Reclamação</option>
        Para inutilizar esse trecho, em ContatoController, foi criado um array associativo, que foi passado
        para o contato.blade.php, que foi passado para form_contato 
        
        o forEach funciona da seguinte forma
        para cada item (na variável $motivo_contatos, coloque o índice na variável $key e o valor na variável $motivo_contato)
        --}}
    </select>
    <br>

    {{ ($errors->has('mensagem')) ?  $errors->first('mensagem') : ''}}
    <textarea name="mensagem" placeholder="Preencha aqui sua mensagem" class="{{ $classe }}">{{old('mensagem')}}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- @if($errors->any())
    <div style="position: absolute; top: 0px; left: 0px; width: 100%; background: red">
        
        @foreach($errors->all() as $erro)
            {{ $erro }}<br>
        @endforeach

    </div>
@endif --}}