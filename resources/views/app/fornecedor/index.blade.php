<h3>Fornecedor</h3>

@php
    //Comentário de uma linha
    /*
        Comentário de muitas linhas
    */
@endphp

{{--@dd($fornecedores)--}}


{{-- comandos if else if
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}

{{-- unless
    Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status'] }}
<br>

@unless($fornecedores[0]['status'] == 'S')
    Fornecedor inativo
@endif --}}

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Interação atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido'}}    <!-- variavel testada nao definida, ou possui o valor nulo, o valor default será utilizado no lugar dela -->
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? 'Dado não preenchido'}}) {{ $fornecedor['telefone'] ?? 'Dado não preenchido'}}
        <br>
        @if($loop->first)
            Primeira iteração do loop
        @endif

        @if($loop->last)
            Última iteração do loop

            <br>
            Total de registros: {{ $loop->count }}
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset
