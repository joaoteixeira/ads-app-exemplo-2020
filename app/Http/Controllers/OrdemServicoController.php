<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\OrdemServico;
use App\Servico;

class OrdemServicoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordem_servicos = OrdemServico::All();

        return view('ordem-servico.index', ['ordem_servicos' => $ordem_servicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::All();

        return view('ordem-servico.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::find($request->cliente);

        if(!$cliente)
            return 'Erro ao selecionar o cliente';

        $data = new \Datetime();

        $os = new OrdemServico;
        $os->cliente()->associate($cliente);
        $os->data = $data->format('Y-m-d');
        $os->save();

        return redirect()->route('ordem-servicos.add-servicos', ['id' => $os->id]);
    }

    public function addServicos($id)
    {
        $os = OrdemServico::find($id);

        $servicos = Servico::All();

        if(!$servicos)
            return 'Nenhum serviço encontrado para ser adicionado.';

        if(!$os)
            return 'Erro na abertura da Ordem de Serviços.';
        
        return view('ordem-servico.add_servicos', ['os' => $os, 'servicos' => $servicos]);
    }

    public function addServicosSave($id, Request $request)
    {
        $os = OrdemServico::find($id);

        if(!$os)
            return 'Erro ao adicionar o Serviço.';

        $servico = Servico::find($request->servico);

        if(!$servico)
            return 'Erro ao adicionar o Serviço.';

        $os->servicos()->attach($servico);

        return redirect()->route('ordem-servicos.add-servicos', ['id' => $os->id]);
    }

    public function removeServicos($id, $servico_id)
    {
        $os = OrdemServico::with('servicos')->find($id);

        if(!$os)
            return 'Erro ao remover o Serviço.';

        $servico = Servico::find($servico_id);

        if(!$servico)
            return 'Erro ao remover o Serviço.';

        $os->servicos()->detach($servico);

        return redirect()->route('ordem-servicos.add-servicos', ['id' => $os->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $os = OrdemServico::find($id);

        return view('ordem-servico.show', ['os' => $os]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
