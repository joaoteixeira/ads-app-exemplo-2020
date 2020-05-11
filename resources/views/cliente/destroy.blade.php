@extends('layouts.admin')

@section('content-title', 'Exclusão de cliente')

@section('content')
    <p class="display-4 text-danger">
        <small>
            Deseja realmente excluir o cliente listado abaixo?
        </small>
    </p>

    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
        @csrf
        @method('DELETE')

        <p>
            <b>Nome:</b> {{ $cliente->nome }} <br>
            <b>E-mail:</b> {{ $cliente->email }}
        </p>

        <button class="btn btn-warning" type="submit">Sim</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-danger" >Cancelar</a>
    </form>
@endsection
