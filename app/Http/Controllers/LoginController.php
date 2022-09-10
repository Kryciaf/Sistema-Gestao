<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->erro == 1) {
            $erro = 'Usuário e/ou senha incorretos';
        }

        if ($request->erro == 2) {
            $erro = 'Necessário login';
        }
        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'required' => 'O campo é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->usuario;
        $senha = $request->senha;

        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $senha)
            ->get()
            ->first();

        if (isset($usuario)) {
           session_start();
           $_SESSION['nome'] = $usuario->nome;
           $_SESSION['email'] = $usuario->email;

           return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' =>1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
