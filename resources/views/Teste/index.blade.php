@extends('layouts.admin')

@section('content-title', 'Clientes cadastrados')

@section('content')

    <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm">Novo cliente</a>

    @if (session('status'))
        <div class="alert alert-success mt-2">
            {!! session('status') !!}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
