<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    //trocando o nome da tabela, para não dar erro no Eloquent, 
    //que reconheceria o nome como fornecedors
    protected $table = 'fornecedores';
    //adicionando o fillable para inserir usando o create com arrays associativos
    //exemplo \App\Model\Fornecedor::create(['nome'=>'Fornecedor ABC', 'site'=>'fornecedorabc.com.br', 'uf'=>'SP', 'email'=>'contato@fornecedorabc.com.br']);
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}