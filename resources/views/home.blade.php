@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')
     <ol class="breadcrumb">
    <div classs="box">
    <a href="/" class="btn btn-primary">Principal</a>
    <a href="meiospag" class="btn btn-primary">Escolher forma de pagamento</a>
    <a href="contas" class="btn btn-primary">Gerencias Contas</a>
  



  
  

       <!-- abaixo usando o nome alias que criei no webroute 
     para o controller ('criacod', 'App\Http\Controllers\Pix\PixController@generatePix')->name('generatePix'); -->
     <a href="consultastoken" class="btn btn-primary">Consultas Pix</a>   
   
  </div>
    </ol>

@stop

