@extends('layouts.admin')

@section('content-title', 'Novo cliente')

@section('content')
    <form action="{{ route('clientes.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="nome">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" name="email">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
