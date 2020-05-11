@extends('layouts.admin')

@section('content-title', 'Novo serviço')

@section('content')
    <form action="{{ route('servicos.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" id="" name="nome">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descricao" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
