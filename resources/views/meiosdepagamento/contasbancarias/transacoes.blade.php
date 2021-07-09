@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
    
          <th>ID</th>
          <th>Conta</th>
          <th>Historico</th>
          <th>Op</th>
          <th>Valor</th>
          <th>Payload</th>  
          <th>Calendario</th>  
          <th>Location</th>  
          <th>Txid</th>  
          <th>Revisao</th>  
          <th>Cpf_devedor</th>  
          <th>Nome_devedor</th>  
          <th>Valordev</th>  
          <th>Chave</th>  
          <th>Solicitacao</th>  
          <th>Statusoperacao</th>  
          <th>Endtoendid</th>  
          <th>Pagadorcpf</th>  
          <th>Pagadornome</th>  
          <th>Horario</th>  
          <th>Rtrid</th>  
          <th>Status</th>
          <th>Data</th>

          <th>
        </th>
      </tr>
        </thead>
        <tbody>
     @forelse($transacoes as $transacao)
      <tr>
      
          <td>{{ $transacao ->id }}</td>
          <td>{{ $transacao ->Conta }}</td>
          <td>{{ $transacao ->Historico}}</td>
          <td>{{ $transacao ->Op }}</td>
          <td>{{ $transacao ->Valor }}</td>
          <td>{{ $transacao ->Payload }}</td>
          <td>{{ $transacao ->Calendario }}</td>
          <td>{{ $transacao ->Location }}</td>
          <td>{{ $transacao ->Txid }}</td>
          <td>{{ $transacao ->Revisao }}</td>
          <td>{{ $transacao ->Cpf_devedor }}</td>
          <td>{{ $transacao ->Nome_devedor }}</td>
          <td>{{ $transacao ->Valordev }}</td>
          <td>{{ $transacao ->Chave }}</td>
          <td>{{ $transacao ->Solicitacao }}</td>
          <td>{{ $transacao ->Statusoperacao  }}</td>
          <td>{{ $transacao ->Endtoendid }}</td>
          <td>{{ $transacao ->Pagadorcpf }}</td>
          <td>{{ $transacao ->Pagadornome }}</td>
          <td>{{ $transacao ->Horario }}</td>
          <td>{{ $transacao ->Rtrid }}</td>
          <td>{{ $transacao ->Status }}</td>
          <td>{{ $transacao ->Data_trans }}</td>
            
          <td>   

        </td>
        <td>  
                                                                                                                                
          </td>
      </tr>
      @empty
      <tr>
          <td colspan="6">Nenhum registro encontrado para listar</td>
      </tr>
      @endforelse
        </tbody>
    </table>




 <a href="contas" class="btn btn-primary">Retornar a Conta</a>

 <a href="consultas" class="btn btn-primary">Consultas</a>
       
</div>
@endsection