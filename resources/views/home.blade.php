@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')

     <ol class="breadcrumb">
    <div classs="box">
    <a href="/" class="btn btn-primary">Principal</a>
    <a href="meiospag" class="btn btn-primary">Escolher forma de pagamento</a>
    <a href="contas" class="btn btn-primary">Gerenciar Contas</a>
             <!-- abaixo usando o nome alias que criei no webroute 
     para o controller ('criacod', 'App\Http\Controllers\Pix\PixController@generatePix')->name('generatePix'); -->

     <a href="consultastoken" class="btn btn-primary">Consultas Pix</a>   
  
 </div>  
    </ol>

    <div class="box">
    <h3> Frete RAPIDO </h3>
    </div>

    <table>  


<td>
    <div class="form-row">
        <div class="form-group col-md-11">
  <a href="cotacao" class="btn btn-primary">Cotacao Frete</a> 
  </div>  
    </td> 
  
  <td>
  <div class="form-row">
        <div class="form-group col-md-11">
  <a href="lista_cotacoes" class="btn btn-primary">Todas as cotacoes</a>    
</div>
</td>
      
  
  
     <td>
     <div class="form-row">
        <div class="form-group col-md-11">
    <form action="api/quote/" method="get">
         @method('post')
<button type="submit" class="btn btn btn-primary" >Cotacao por Route</button>
     </form>  
     </div>
</td>
<td>
<div class="form-row">
        <div class="form-group col-md-11">
     <form action="/api/cnpj/cnpj" method="get">
     @method('get')
<button type="submit" class="btn btn btn-primary" >outra cotacao Controller</button>
     </form>
     </div>
      </td>    
</table>




<div class="box">
    <h3> Melhor Envio</h3>
    </div>

    <table>  


<td>
    <div class="form-row">
        <div class="form-group col-md-11">
  <a href="cotacao" class="btn btn-primary">Cotacao Frete</a> 
  </div>  
    </td> 

   <t/able> 


   <table>

   <div class="box">
    <h3> Cadastrar Transportadoras</h3>
    </div>

    <td>
    <div class="form-row">
        <div class="form-group col-md-11">
        <a href="transportadoras" class="btn btn-primary">Transportadoras</a>
  </div>  
    </td> 

 </div>
   </ol>





     




@stop

