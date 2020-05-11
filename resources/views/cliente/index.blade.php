@extends('layouts.admin')

@section('content-title', 'Clientes cadastrados')

@section('content')
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Novo cliente</a>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('statusUpdate'))
        <div class="alert alert-info">
            {!! session('statusUpdate') !!}
        </div>
    @endif

    @if(!count($clientes))
        <div class="alert alert-info">
            Nenhum registro encontrado!
        </div>
    @endif

    @if(count($clientes))
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>

                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>

                            <a href="{{ route('clientes.destroy-confirm', $cliente->id) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
