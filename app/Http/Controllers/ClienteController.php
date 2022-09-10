<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();

        return view('app.cliente.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
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
            'estado' => 'required|size:2|in:AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MS,MT,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'in' => 'O estado é inválido. Escreva em letras maiúsculas'
        ];

        $request->validate($regras, $feedback);

        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->estado = $request->estado;
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::where('id', $id)->first();

        return view('app.cliente.edit', ['cliente' => $cliente]);
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
        //Busca o cliente para editar
        $cliente = Cliente::where('id', '=', $id)->first();

        $regras = [
            'nome' => 'required|min:3|max:40',
            'uf' => 'required|size:2|in:AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MS,MT,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'in' => 'O estado é inválido. Escreva em letras maiúsculas'
        ];

        $request->validate($regras, $feedback);

        try {
            $cliente->nome = $request->nome;
            $cliente->estado = $request->uf;
            $cliente->save();
        } catch (\Exception $e) {

        }

        return view('app.cliente.edit', ['cliente' => $cliente]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::where('id', '=', $id)->first();
        $cliente->delete();

        $clientes = Cliente::get();

        return view('app.cliente.index', ['clientes' => $clientes]);
    }
}
