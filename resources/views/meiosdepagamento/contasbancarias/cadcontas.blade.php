@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<div class="card border">
  <div class="card-body">
<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>

     
<form action="savecontas" method="get">
      
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="nomebanco">Nome do Banco</label>
          <input type="text" class="form-control" name="nomebanco" id="nomebanco" >
        </div>

        <div class="form-group col-md-2">
          <label for="numbanco">Numero</label>
          
          <input type="text" class="form-control" name="numbanco" id="numbanco" >
        </div>

        <div class="form-group col-md-2">
          <label for="agencia">Agencia</label>
          
          <input type="text" class="form-control" name="agencia" id="agencia" >
        </div>

        <div class="form-group col-md4">
          <label for="padrao">Definir como Padrao</label>
          <input type="checkbox" class="form-control"  name="padrao" id="padrao" >

        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="conta">Conta</label>
          <input type="text" class="form-control" name="conta" id="conta" >
        </div>


        
        <div class="form-group col-md-4">
          <label for="pix">Pix</label>
          
          <input type="text" class="form-control" name="pix" id="pix" >
        </div>

        <div class="form-group col-md-5">
          <label for="titular">Titular</label>
          
          <input type="text" class="form-control" name="titular" id="titular" >
        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="logradouro">Logradouro</label>
          <input type="text" class="form-control" name="logradouro" id="logradouro" >
        </div>

        <div class="form-group col-md-5">
          <label for="cidade">Cidade</label>
          
          <input type="text" class="form-control" name="municipio" id="municipio" >
        </div>
        <div class="form-group col-md-1">
          <label for="uf">Estado</label>
          
          <input type="text" class="form-control" name="uf" id="uf" >
        </div>






        <div class="form-row">
        <div class="form-group col-md-3">
          <label for="txid">TxId</label>
          
          <input type="text" class="form-control" name="txid" id="txid" >
        </div>

        <div class="form-group col-md-5">
          <label for="data">Data de Cadastro</label>
          
          <input type="date" class="form-control" name="data" id="data">
        </div>




        
      </div>

  </div>

  <div class="form-row">
  <div classs="box"> 
  </div>    
  <div classs="box"> 
  </div>
         
    <div classs="box"> 
     <button type="submit" class="btn btn btn-primary" >Cadastrar</button>
     <a href="contas" class="btn btn btn-danger" >Cancelar</a>

  </div>

  </div>
   
    </form>

  
        </thead>
    </tr>
  

    @endsection



