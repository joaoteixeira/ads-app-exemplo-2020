@extends('layouts.admin')

@section('content-title', 'Ordem Serviços :: Adicionar Serviço :: Nº ' .  $os->id)

@section('content')
  <form action="{{ route('ordem-servicos.add-servicos', [$os->id]) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
            <label for="">Data</label>
            <input class="form-control" type="text" value="{{ date('d/m/Y', strtotime($os->data)) }}" disabled>
        </div>
      </div>

      <div class="col-md-9">
        <div class="form-group">
            <label for="">Cliente</label>
            <input class="form-control" type="text" value="{{ $os->cliente->nome }}" disabled>
        </div>
      </div>
    
    </div>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Serviços</label>
          <select name="servico" class="form-control">
              <option>Selecione o serviço</option>

              @foreach($servicos as $servico)
                <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
              @endforeach
          </select>
        </div>
        
      </div>  
      <div class="col-md-9">
        <h4>Serviços adicionados</h4>

        @if(!count($os->servicos))
        <div class="alert alert-info">
          Nenhum serviço adicionado.
        </div>
        @endif

        @if(count($os->servicos))
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Serviço</th>
              <th>Opção</th>
            </tr>
          </thead>
          <tbody>
            @foreach($os->servicos as $servico)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $servico->nome }}</td>
              <td>
                <a href="{{ route('ordem-servicos.remove-servicos', [$os->id, $servico->id]) }}">Excluir</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>

      
    </div>
    <button type="submit" class="btn btn-primary">Adicionar serviço</button>
    <a href="{{ route('ordem-servicos.index') }}" class="btn btn-warning">Fechar OS</a>
    </form>
@endsection