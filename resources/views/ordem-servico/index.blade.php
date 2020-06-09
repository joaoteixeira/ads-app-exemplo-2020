@extends('layouts.admin')

@section('content-title', 'Ordem Serviços')

@section('content')
    <a href="{{ route('ordem-servicos.create') }}" class="btn btn-primary mb-2">Nova Ordem de serviço</a>

@endsection