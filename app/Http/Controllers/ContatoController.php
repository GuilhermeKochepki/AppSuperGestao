<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');

        print_r($contato->getAttributes());
        */

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */

        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();
        
        // $contato = new SiteContato();
        // $contato->create($request->all());

        // $motivo_contatos = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação'
        // ];

        $motivo_contatos = MotivoContato::all();


        return view('site.contato', ['titulo' => 'Contato {teste}', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        // antes precisa realizar a validação dos dados. Para que o erro seja compreensivel ao usuario
        $request->validate([
            'nome' => 'min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000',
        ]);
        // SiteContato::create($request->all());
        // return view('site.contato', ['titulo' => 'Contato {teste}']);
    }
}
