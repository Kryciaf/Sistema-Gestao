<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::get();

        return view('app.pedido.index', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();

        return \view('app.pedido.create', ['clientes' => $clientes]);
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
            'cliente_id' => 'exists:clientes,id',
        ];

        $feedback = [
            'cliente_id.exists' => 'O cliente informado não existe'
        ];

        $request->validate($regras, $feedback);

        $pedido = new Pedido();
        $pedido->cliente_id = $request->cliente_id;
        $pedido->save();

        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = Pedido::select('pedidos.*', 'pedido_produtos.*', 'pedido_produtos.*')
            ->join('pedido_produtos', 'pedido_produtos.pedido_id', 'pedidos.id')
            ->where('pedidos.id', '=', $id)->get();

        $produtos_item = Produto::select('produtos.*', 'pedido_produtos.produto_id')
            ->join('pedido_produtos', 'pedido_produtos.produto_id', 'produtos.id')
            ->get();

        return view('app.pedido.show', ['produtos_item' => $produtos_item, 'produtos' => $produtos]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
