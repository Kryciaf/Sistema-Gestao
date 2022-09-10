<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function index(Request $request)
    {
        $motivo_contato = MotivoContato::all();
        return view('site.index', ['motivo_contato' => $motivo_contato]);
    }

    public function save(Request $request) {

        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required',
        ],
        [
            'required' => 'O campo :attribute deve ser preenchido',
            'email' => 'O email informado não é válido'
        ]);

        $contato = new SiteContato();
        $contato->nome = $request->nome;
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->mensagem = $request->mensagem;
        $contato->motivo_contatos_id = $request->motivo_contatos_id;
        $contato->save();

        return redirect()->route('site.index')->withErrors('Seu contato foi enviado. Em breve retornaremos');
    }
}
