@extends('layouts.admin')

@section('content-title', 'Ordem Serviços')

@section('content')
    <a href="{{ route('ordem-servicos.create') }}" class="btn btn-primary mb-2">Nova Ordem de serviço</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nº OS</th>
                <th>Data</th>
                <th>Cliente</th>
                <td>Quant. Serviços</td>
                <th>Opção</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordem_servicos as $os)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $os->id }}</td>
                <td>{{ date('d/m/Y', strtotime($os->data)) }}</td>
                <td>{{ $os->cliente->nome }}</td>
                <td><span class="alert alert-warning">{{ count($os->servicos) }}</span> <a href="{{ route('ordem-servicos.add-servicos', [$os->id]) }}" class="btn btn-sm btn-dark">Adicionar serviços</a></td>
                <td>
                    
                    <a href="{{ route('ordem-servicos.show', [$os->id]) }}" class="btn btn-sm btn-info">Abrir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection