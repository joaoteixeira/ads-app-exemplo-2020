@extends('layouts.admin')

@section('content-title', 'Atualização de cliente')

@section('content')
    <form action="/clientes/{{ $cliente->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="nome" value="{{ $cliente->nome }}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" name="email" value="{{ $cliente->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>
        <a href="/clientes" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
