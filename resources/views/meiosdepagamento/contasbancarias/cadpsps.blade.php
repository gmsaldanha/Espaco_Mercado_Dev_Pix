@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<div class="card border">
  <div class="card-body">
<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
     
     
<form action="savepsps" method="get">
      
      <div class="form-row">
        <div class="form-group col-md-11">
          <label for="endpoint">EndPoint</label>
          <input type="text" class="form-control" name="endpoint" id="endpoint" >
        </div> </div>
        <div class="form-row">
        <div class="form-group col-md-11">
           <label for="putpoint">Putpoint</label>          
          <input type="text" class="form-control" name="putpoint" id="putpoint" >
        </div></div>

        <div class="form-row">
        <div class="form-group col-md-11">
          <label for="getpoint">GetPoint</label>          
          <input type="text" class="form-control" name="getpoint" id="getpoint" >
        </div></div>
        <div class="form-row">
        <div class="form-group col-md3">
          <label for="grant_type">grant_type</label>
          <input type="text" class="form-control"  name="grant_type" id="grant_type" >
      </div>
      
        <div class="form-group col-md-6">
          <label for="scope">scope</label>
          <input type="text" class="form-control" name="scope" id="scope" >
        </div>      
      
      
      </div>



      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="content_Type">Content_Type</label>
       
          <input type="text" class="form-control" name="content_Type" id="content_Type" >
        </div>  </div>




        <div class="form-group col-md-50">
          <label for="authorization">Authorization</label>
          
          <input type="text" class="form-control" name="authorization" id="authorization" >
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



