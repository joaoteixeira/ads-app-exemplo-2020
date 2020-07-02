@extends('layouts.admin')

@section('content-title', 'Ordem de Serviços - Detalhes :: Nº ' .  $os->id)

@section('content')
  <p>
    Cliente: {{$os->cliente->nome}}    
  </p>
  <p>
    Data: {{$os->data}}
  </p>

  <p>
    Serviços

    <ul>
      @foreach($os->servicos as $servico)
      <li>{{ $servico->nome }}</li>
      @endforeach
    </ul>
  </p>
@endsection