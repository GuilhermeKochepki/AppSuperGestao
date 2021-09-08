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
        
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedback = [
            //'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'Nome precisa ter no mínimo 3 dígitos',
            'nome.max' => 'Nome pode ter no máximo 40 dígitos',
            //'telefone.required' => 'O campo telefone precisa ser preenchido',
            //'email.required' => 'O campo e-mail precisa ser preenchido',
            'email.email' => 'O e-mail digitado não é valido',
            'motivo_contatos_id.required' => 'O campo motivo do contato precisa ser preenchido',
            //'mensagem.required' => 'O campo mensagem precisa ser digitado',
            'mensagem.mensagem' => 'Mensagem pode ter no máximo 2000 caracteres',

            'required' => 'O campo :attribute deve ser preenchido'
        ];
        
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        //esse comando habilita a persistencia dos dados no banco  

        return redirect()->route('site.index');

        // return view('site.contato', ['titulo' => 'Contato {teste}']);
    }
}
