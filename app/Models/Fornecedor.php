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
}
