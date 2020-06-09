@extends('layouts.admin')

@section('content-title', 'Nova Ordem de Serviço')

@section('content')
    <form action="{{ route('ordem-servicos.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Data</label>
            <input class="form-control" type="text" value="{{ date('d/M/Y') }}" disabled>
        </div>
        <div class="form-group">
            <label for="">Cliente</label>
            <select name="cliente" class="form-control">
                <option>Selecione um cliente</option>

                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option> 
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Status da OS</label>
            <input class="form-control" type="text" value="Aberto" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Abrir OS</button>
    </form>
@endsection
