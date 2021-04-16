<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreUpdateCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cliente = Cliente::latest()->paginate();
        return view('cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        Cliente::create($data);

        return redirect()
            ->route('cliente.index')
            ->with('message', 'Cliente Criado com sucesso!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return redirect()->route('cliente.index');
        }
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (!$cliente = Cliente::find($id)) {
            dd('editando post' . $id);
            return redirect()->back();
        }

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if (!$cliente = Cliente::find($id)) {
            return redirect()->back();
        }

        $cliente->update($request->all());

        return redirect()
            ->route('cliente.index')
            ->with('message', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!$cliente = Cliente::find($id)) {
            return redirect()->route('cliente.index');
        }

        $cliente->delete();

        return redirect()
            ->route('cliente.index')
            ->with('message', 'Cliente Deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        // dd("pesquisa por:{$request->search}");
        $cliente = Cliente::where('id', '=', $request->search)
            ->orWhere('nome', 'LIKE', "%{$request->search}%")
            ->orWhere('dtnascimento', 'LIKE', "%{$request->search}%")
            ->paginate();

        return view('cliente.index', compact('cliente', 'filters'));
    }
}
