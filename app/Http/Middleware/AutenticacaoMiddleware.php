<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil, $param3, $param4)
    {
        echo $metodo_autenticacao . ' - '  .$perfil .'<br>';

        if ($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados' . $perfil . '<br>';
        }

        if ($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD' . $perfil . '<br>';
        }

        if ($perfil == 'visitante'){
            echo 'Mostrar apenas alguns recursos' . '<br>';
        } else{
            echo 'Carregar perfil do banco de dados' . '<br>';
        }

        //verifica se o usuário possui acesso a rota
        if (true) {
            return $next($request);
        }
        else {
            return Response('Acesso negado! Rota exige autenticação');
        }
    }
}
