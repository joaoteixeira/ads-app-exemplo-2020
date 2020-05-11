@extends('layouts.admin')

@section('content-title', 'Exclusão de serviço')

@section('content')
    <p class="display-4 text-danger">
        <small>
            Deseja realmente excluir o serviço listado abaixo?
        </small>
    </p>

    <form action="{{ route('servicos.destroy', $servico->id) }}" method="post">
        @csrf
        @method('DELETE')

        <p>
            <b>Nome:</b> {{ $servico->nome }} <br>
            <b>Descrição:</b> {{ $servico->descricao }}
        </p>

        <button class="btn btn-warning" type="submit">Sim</button>
        <a href="{{ route('servicos.index') }}" class="btn btn-danger" >Cancelar</a>
    </form>
@endsection
