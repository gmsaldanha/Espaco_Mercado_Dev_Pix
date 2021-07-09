@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<hr>
<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
          
          <th>Banco</th>
          <th>Agencia</th>
          <th>Conta</th>
          <th>Pix</th>
          <th>
        <a href="{{ route('contas.create') }}" class="btn btn-info btn-sm" >Novo</a>
          </th>
      </tr>
        </thead>
        <tbody>
@forelse($contas as $conta)
      <tr>
          <td>{{ $conta->id }}</td>
          <td>{{ $conta ->Banco }}</td>
          <td>{{ $conta->Agencia}}</td>
          <td>{{ $conta->Conta }}</td>
          <td>{{ $conta->Pix }}</td>
          <td>*/
        <a href="{{ route('contas.edit', ['id' => $conta->id]) }}" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="{{ route('contas.destroy', ['id' => $conta->id]) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
            @csrf
            <input type="hidden" name="_method" value="delete" >
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
</div>
@endsection