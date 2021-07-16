@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
    
          <th>ID</th>
          <th>EndPoint</th>  
          <th>
 <a href="{{ route('criapsps') }}" class="btn btn-info btn-sm" >Novo</a>
       
          </th>      
      </tr>
       
        </thead>
        <tbody>
     @forelse($psps as $psp)
      <tr>      
          <td>{{ $psp->id }}</td>
          <td>{{ $psp->EndPoint }}</td>
          <td>

                
          <form method="get" action="{{ route('editpsp', ['id' => $psp->id]) }}" style="display: inline" onsubmit="return confirm('Deseja modificar este registro?');" >
            @csrf
                        <input type="hidden" name="edit" value="edit" >
            <button class="btn btn-primary btn-sm">Editar</button>
        </form>

        </td>
        
        <td>  
            <form method="get" action="{{ route('delpsps', ['id' => $psp->id]) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
            <!--@csrf-->
            <input type="hidden" name="delete" value="delete" >
            <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
     
          </td>

<td>

 
        </td>
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

  
</div>
@endsection