<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class ForncedorController extends Controller
{
    public function index(Request $request)
    {
        $fornecedores = Fornecedor::get();

        return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);
    }

    public function show($id)
    {
        $fornecedor = Fornecedor::where('id', $id)->first();

        $produtos = Produto::select('produtos.*')
            ->join('fornecedores', 'produtos.fornecedor_id', 'fornecedores.id')
            ->where('produtos.fornecedor_id', '=', $fornecedor->id)
            ->get();

        return \view('app.fornecedor.show', ['fornecedor' => $fornecedor, 'produtos' => $produtos]);
    }

    public function adicionar(Request $request)
    {
        if ($request->_token != '' && $request->id == '') {
            $regras = [
                'nome' => 'required',
                'uf' => 'required|size:2|in:AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MS,MT,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO',
                'email' => 'required|email',
            ];

            $fedback = [
                'required' => "O campo :attribute deve ser preenchido",
                'email' => "Informe um email válido",
                'in' => 'O estado é inválido. Escreva em letras maiúsculas'
            ];

            $request->validate($regras, $fedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }

        return view('app.fornecedor.adicionar');
    }

    public function editar(Request  $request, $id){

        $fornecedor = Fornecedor::find($id);

        if ($request->_token != '' && $request->id != '') {
            $regras = [
                'nome' => 'required',
                'uf' => 'required|size:2|in:AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MS,MT,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO',
                'email' => 'required|email',
            ];

            $fedback = [
                'required' => "O campo :attribute deve ser preenchido",
                'email' => "Informe um email válido",
                'in' => 'O estado é inválido. Escreva em letras maiúsculas'
            ];

            $request->validate($regras, $fedback);

            $fornecedor = Fornecedor::find($request->id);
            $fornecedor->update($request->all());
        }

        return view('app/fornecedor/editar', ['fornecedor' => $fornecedor]);
    }

    public function excluir($id){

        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }


}
