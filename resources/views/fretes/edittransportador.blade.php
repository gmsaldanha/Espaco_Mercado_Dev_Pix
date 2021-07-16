@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')
    
<div class="card border">
  <div class="card-body">
  <form action="{{ route('atutransportadora', ['id' => $transportadors->id]) }}" method="post">
@method('put')
@csrf

<div class="form-row">
        <div class="form-group col-md-4">
          <label for="Transportadora">Transportadora</label>
          <input type="text" class="form-control" name="Transportadora" id="Transportadora" value="{{ $transportadors->Transportadora }}">
      </div>
        <div class="form-group col-md-8">
          <label for="Url_transp">Url_transp</label>
          <input type="text" class="form-control" name="Url_transp" id="Url_transp" value="{{ $transportadors->Url_transp }}">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-12">
          <label for="Token">Token</label>          
          <input type="text" class="form-control" name="Token" id="Token" value="{{ $transportadors->Token }}">
        </div>


        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Url_Redir">Url_Redir</label>          
          <input type="text" class="form-control" name="Url_Redir" id="Url_Redir" value="{{ $transportadors->Url_Redir }}">
        </div>

        <div class="form-group col-md-6">
          <label for="CallBack">CallBack</label>          
          <input type="text" class="form-control" name="CallBack" id="CallBack" value="{{ $transportadors->CallBack }}">
        </div>



      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="Client_id">Client_id</label>          
          <input type="text" class="form-control" name="Client_id" id="Client_id" value="{{ $transportadors->Client_id }}">
        </div>


      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="Authorization">Authorization</label>
          <input type="text" class="form-control" name="Authorization" id="Authorization" value="{{ $transportadors->Authorization }}">
        </div>


        
      


        <div class="form-group col-md-5">
          <label for="Content_Type">Content_Type</label>          
          <input type="text" class="form-control" name="Content_Type" id="Content_Type" value="{{ $transportadors->Content_Type }}">
        </div>
        <div class="form-group col-md-4">
          <label for="scope">Scope</label>          
          <input type="text" class="form-control" name="scope" id="scope" value="{{ $transportadors->scope }}">
        </div>



  

  </div>

  <div class="form-row">
  <div classs="box"> 
  </div>    
  <div classs="box"> 
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
     <a href="transportadoras" class="btn btn btn-danger" >Cancelar</a>

   
    </div>  



      </div>

 
     
  </div>
        </thead>
    </tr>

@endsection