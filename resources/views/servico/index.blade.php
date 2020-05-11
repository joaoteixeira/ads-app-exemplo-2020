@extends('layouts.admin')

@section('content-title', 'Serviços cadastrados')

@section('content')
    <a href="{{ route('servicos.create') }}" class="btn btn-primary mb-2">Novo serviço</a>

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

    @if(!count($servicos))
        <div class="alert alert-secondary">
            Nenhum registro encontrado!
        </div>
    @endif

    @if(count($servicos))
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>

                @foreach($servicos as $servico)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $servico->nome }}</td>
                        <td>{{ $servico->descricao }}</td>
                        <td>
                            <a href="{{ route('servicos.edit', $servico->id) }}">Editar</a>

                            <a href="{{ route('servicos.destroy-confirm', $servico->id) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
