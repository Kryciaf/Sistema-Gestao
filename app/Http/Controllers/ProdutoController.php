<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\View\View;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return \view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|max:2000',
            'peso' => 'required|integer',
            'fornecedor_id' => 'exists:fornecedores,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->peso = $request->peso;
        $produto->fornecedor_id = $request->fornecedor_id;
        $produto->save();

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return \view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return \view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $product = Produto::where('id', '=', $produto->id)->first();

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'fornecedor_id' => 'exists:fornecedores,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);

        try {
            $product->nome = $request->nome;
            $product->descricao = $request->descricao;
            $product->peso = $request->peso;
            $product->fornecedor_id = $request->fornecedor_id;
            $product->save();
        } catch (\Exception $e) {

        }

        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
