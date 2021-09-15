<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{ 
    public function index(Request $request) {

        $erro = '';

        switch($request->get('erro')){
            case 1:    
                $erro = 'Usuário e/ou senha não existe';
                break;
            case 2: 
                $erro = 'Usuário não logado no sistema';
                break;
        }

        // if($request->get('erro') == 1){
        //     $erro = 'Usuário e/ou senha não existe';
        // }

        return view('site.login',['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request){
        
        //regra de validação
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        //feedback de validação
        $feedback = [
            'email' => 'O e-mail digitado é inválido',
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($regras,$feedback);

        //parametros recuperados
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuario: $email <br>";
        echo "Senha: $password <br>";

        //iniciar o model user
        $user = new User();

        $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();

        if (isset($usuario->name)){
            //dd($usuario);

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            //dd($_SESSION);

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => '1']);
        }

    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
