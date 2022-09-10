<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->server->get('HTTP_HOST');
        $route = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $route"]);

        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O status e texto foram alterados');

        return $resposta;
    }
}
