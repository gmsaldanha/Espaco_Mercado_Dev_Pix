@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')

aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
    
          <th>ID</th>
          <th>EndPoint</th>
          <th>PutPoint</th>
          <th>GetPoint</th>
          <th>grant_type</th>
          <th>scope</th>          
          <th>Content-Type</th>
          <th>Authorization</th>          
           <th>
        </th>
      </tr>
        </thead>
        <tbody>
     @forelse($psps as $psp)
      <tr>
      
          <td>{{ $psp->id }}</td>
          <td>{{ $psp->EndPoint }}</td>
          <td>{{ $psp ->PutPoint}}</td>
          <td>{{ $psp->GetPoint }}</td>
          <td>{{ $psp ->grant_type }}</td>
          <td>{{ $psp ->Content_Type }}</td>
          <td>{{ $psp ->Authorization}}</td>
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