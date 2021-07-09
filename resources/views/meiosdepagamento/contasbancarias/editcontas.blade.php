@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')
    
<div class="card border">
  <div class="card-body">
  <form action="atucontas" method="get">
      @csrf

      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="nomebanco">Nome do Banco</label>
          <input type="text" class="form-control" name="nomebanco" id="nomebanco" value="{{ $contas->Banco }}">
        </div>

        <div class="form-group col-md-2">
          <label for="numbanco">Numero</label>
          
          <input type="text" class="form-control" name="numbanco" id="numbanco" value="{{ $contas->NumBanco }}">
        </div>
        

        <div class="form-group col-md-2">
          <label for="agencia">Agencia</label>
          
          <input type="text" class="form-control" name="agencia" id="agencia" value="{{ $contas->Agencia }}">
        </div>

        <div class="form-group col-md4">
          <label for="padrao">Definir como Padrao</label>
          <input type="checkbox" class="form-control"  name="padrao" id="padrao"value="{{ $contas->Padrao}}">

        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="conta">Conta</label>
          <input type="text" class="form-control" name="conta" id="conta" value="{{ $contas->Conta }}">
        </div>

        <div class="form-group col-md-4">
          <label for="pix">Pix</label>
          
          <input type="text" class="form-control" name="pix" id="pix" value="{{ $contas->CodigoPix }}">
        </div>

        <div class="form-group col-md-5">
          <label for="titular">Titular</label>
          
          <input type="text" class="form-control" name="titular" id="titular" value="{{ $contas->Titular }}">
        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="logradouro">Logradouro</label>
          <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{ $contas->Logradouro }}">
        </div>

        <div class="form-group col-md-5">
          <label for="cidade">Cidade</label>
          
          <input type="text" class="form-control" name="municipio" id="municipio" value="{{ $contas->Municipio }}">
        </div>
        <div class="form-group col-md-1">
          <label for="uf">Estado</label>
          
          <input type="text" class="form-control" name="uf" id="uf" value="{{ $contas->Uf }}">
        </div>






        <div class="form-row">
        <div class="form-group col-md-3">
          <label for="txid">TxId</label>
          
          <input type="text" class="form-control" name="txid" id="txid" value="{{ $contas->TxId }}">
        </div>

        <div class="form-group col-md-5">
          <label for="data">Data de Cadastro</label>
          
          <input type="date" class="form-control" name="data" id="data"value="{{ $contas->Data }}">
        </div>




        
      </div>

  </div>

  <div class="form-row">
  <div classs="box"> 
  </div>    
  <div classs="box"> 
  </div>
      </div>


      </div>

  </div>

  <div class="form-row">
  <div classs="box"> 
  </div>    
  <div classs="box"> 
  </div>
         
    <div classs="box"> 
     <button type="submit" class="btn btn btn-primary" >Salvar</button>
     <a href="contas" class="btn btn btn-danger" >Cancelar</a>
   
    <a href="{{route('criapsps' )}}" class="btn btn-primary">Cadastrar PSP</a>

   
    </div>  



      </div>

 
     
  </div>
        </thead>
    </tr>

@endsection