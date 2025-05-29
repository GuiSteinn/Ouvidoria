<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está logado e se é admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request); // tudo certo, segue
        }

        abort(403, 'Acesso não autorizado.'); // bloqueia se não for admin
    }
}
