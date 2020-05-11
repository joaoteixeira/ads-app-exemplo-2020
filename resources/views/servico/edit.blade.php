@extends('layouts.admin')

@section('content-title', 'Atualização de serviço')

@section('content')
    <form action="/servicos/{{ $servico->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="nome" value="{{ $servico->nome }}">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descricao" id="" cols="30" rows="10" class="form-control">{{ $servico->descricao }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>
        <a href="/servicos" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
