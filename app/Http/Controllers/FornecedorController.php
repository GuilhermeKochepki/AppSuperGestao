<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0=>['nome' =>'Fornecedor 1', 
                'status' => 'N', 
                'cnpj' => '',
                'ddd' => '11', //São Paulo (SP)
                'telefone' => '0000-0000'
            ],
            1=>['nome' =>'Fornecedor 2', 
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85',    //Fortaleza(Ceará)
                'telefone' => '0000-0000'
            ],
            2=>['nome' =>'Fornecedor 3', 
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32',    //Juiz de Fora (Minas Gerais)
                'telefone' => '0000-0000'
            ],
        ];

        $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo $msg;

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
