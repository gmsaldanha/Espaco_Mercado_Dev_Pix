@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>    
          <th>ID</th>
          <th>Transportadora</th>   
          <th>Client_Id</th>  
          <th>Url_Transp</th>  
      </tr>
        </thead>
        <tbody>
     @forelse($transportadors as $transportador)
      <tr>      
          <td>{{ $transportador ->id }}</td>
          <td>{{ $transportador ->Transportadora }}</td>
          <td>{{ $transportador ->Client_id }}</td>
          <td>{{ $transportador ->Url_transp}}</td>
          <td>                     
           <form method="get" action="{{ route('edittransportadora', ['id' => $transportador->id]) }}" style="display: inline" onsubmit="return confirm('Deseja modificar este registro?');" >
            <!--@csrf-->
            <input type="hidden" name="edit" value="edit" >
            <button class="btn btn-primary btn-sm">Editar</button>
        </form>
        </td>
             
        <td>  
            <form method="get" action="{{ route('deltransportadora', ['id' => $transportador->id]) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
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



    <form method="get" action="{{ route('criatransportadora') }}" style="display: inline" >
            <!--@csrf-->
            <input type="hidden" name="_cadtransportadora"  >
            <button class="btn btn-primary btn">Cadastrar Nova Conta</button>
        </form>
 <a href="/" class="btn btn-primary">Principal</a>
  
</div>
@endsection