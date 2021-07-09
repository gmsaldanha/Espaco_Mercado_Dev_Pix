@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
    
          <th>ID</th>
          <th>Banco</th>
          <th>Numbanco</th>
          <th>Agencia</th>
          <th>Conta</th>
          <th>CodigoPix</th>
          <th>Titular</th>
          <th>Padrao</th>
        
          <th>

        </th>
      </tr>
        </thead>
        <tbody>
     @forelse($contas as $conta)
      <tr>
      
          <td>{{ $conta ->id }}</td>
          <td>{{ $conta ->Banco }}</td>
          <td>{{ $conta ->NumBanco}}</td>
          <td>{{ $conta ->Agencia }}</td>
          <td>{{ $conta ->Conta }}</td>
          <td>{{ $conta ->CodigoPix }}</td>
          <td>{{ $conta ->Titular }}</td>
          <td>{{ $conta ->Padrao}}</td>      
          <td>   

         
           <form method="get" action="{{ route('editcontas', ['id' => $conta->id]) }}" style="display: inline" onsubmit="return confirm('Deseja modificar este registro?');" >
            <!--@csrf-->
            <input type="hidden" name="edit" value="edit" >
            <button class="btn btn-primary btn-sm">Editar</button>
        </form>

        </td>
        
        <td>  
            <form method="get" action="{{ route('delcontas', ['id' => $conta->id]) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
            <!--@csrf-->
            <input type="hidden" name="delete" value="delete" >
            <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
          </td>
      </tr>
      @empty
      <tr>
          <td colspan="6">Nenhum registro encontrado para listar</td>
      </tr>
      @endforelse
        </tbody>
    </table>



    <form method="get" action="{{ route('criacontas') }}" style="display: inline" >
            <!--@csrf-->
            <input type="hidden" name="_cadconta"  >
            <button class="btn btn-primary btn">Cadastrar Nova Conta</button>
        </form>
        <a href="Transacoes" class="btn btn btn-primary" >Historico da conta</a>

 <a href="/" class="btn btn-primary">Principal</a>
  
</div>
@endsection