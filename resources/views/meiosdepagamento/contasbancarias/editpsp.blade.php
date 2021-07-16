@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')


<div class="card border">
  <div class="card-body">
<div class="container">
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
    
     
<form action="{{ route('atupsps', ['id' => $psps->id]) }}" method="post">
@method('put')
@csrf

      <div class="form-row">
        <div class="form-group col-md-11">
          <label for="endpoint">EndPoint</label>
          <input type="text" class="form-control" name="endpoint" id="endpoint" value="{{ $psps->EndPoint }}">
        </div> </div>
        <div class="form-row">
        <div class="form-group col-md-11">
           <label for="putpoint">Putpoint</label>          
          <input type="text" class="form-control" name="putpoint" id="putpoint" value="{{ $psps->PutPoint }}">
        </div></div>

        <div class="form-row">
        <div class="form-group col-md-11">
          <label for="getpoint">GetPoint</label>          
          <input type="text" class="form-control" name="getpoint" id="getpoint" value="{{ $psps->GetPoint }}">
        </div></div>
        <div class="form-row">
        <div class="form-group col-md3">
          <label for="grant_type">grant_type</label>
          <input type="text" class="form-control"  name="grant_type" id="grant_type" value="{{ $psps->grant_type }}">
      </div>
      
        <div class="form-group col-md-6">
          <label for="scope">scope</label>
          <input type="text" class="form-control" name="scope" id="scope" value="{{ $psps->scope }}">
        </div>      
      
      
      </div>



      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="content_Type">Content_Type</label>
       
          <input type="text" class="form-control" name="content_Type" id="content_Type" value="{{ $psps->Content_Type}}">
        </div>  </div>




        <div class="form-group col-md-50">
          <label for="authorization">Authorization</label>
          
          <input type="text" class="form-control" name="authorization" id="authorization" value="{{ $psps->Authorization }}">
        </div>

      </div>



  <div class="form-row">
  <div classs="box"> 
  </div>    
  <div classs="box"> 
  </div>
      <div classs="box"> 
     <button type="submit" class="btn btn btn-primary" >Salvar</button>
     </form>
     <a href="lispsps" class="btn btn btn-danger" >Cancelar</a>
   
      </div>          
   </div>
   
   
        </thead>
    </tr>

    @endsection



