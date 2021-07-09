@extends('adminlte::page')

@section('title', 'Espaço Mercado')

@section('content_header')
<script> 
function pix(){  
  location.href = "{{ 'criacod'  }}";
  document.formulario.submit();
}                 



function cc(){
  location.href = "{{ 'cc' }}";
  document.formulario.submit();
}
function cd(){
  location.href = "{{ 'cd' }}";
  document.formulario.submit();
}
function bb(){
  location.href = "{{ 'bb' }}";
  document.formulario.submit();
}
function py(){
  location.href = "{{ 'py' }}";
  document.formulario.submit();
}
function mp(){
  location.href = "{{ 'mp' }}";
  document.formulario.submit();
}

</script>
<h3>Insira um valor no campo abaixo</h3>
<h3>Isso irá simular uma variavel com R$</h3>

<form name="formulario" action="{{ route('variavelvalor') }}" method="get">
<div class="form-row">

        <div class="form-group col-md-2">
          <label for="variavelvalor">Valor a Receber</label>
          <input type="text" class="form-control" name="variavelvalor" id="variavelvalor" >
       </div>
      

       <div class="form-group col-md-4">
          <label for="variavelvalor">Referencia</label>
          <input type="text" class="form-control" name="mensagem" id="mens" >
       </div>

</div>

<div class="form-row">
       <div class="form-group col-md-3">
          <label for="variavelcpf">Cpf Comprador</label>
          <input type="text" class="form-control" name="variavelcpf" id="variavelcpf" >
       </div>
      

       <div class="form-group col-md-6">
          <label for="variavelnome">Nome Comprador</label>
          <input type="text" class="form-control" name="variavelnome" id="variavelnome" >
       </div>

       </div>


          <input type="hidden" name="v1" onclick="pix()" >    
     
      
      </div>

         
        <div class="form-group col-md-5" >  
           <a href="/" class="btn btn btn-primary" >Retornar a Tela Principal</a>
         </div>

         





 <h3>Escolha a forma de pagamento</h3>
<div class="radio ">
  <label  ><input name="course" type="radio" onclick="pix()">Pagamento Pix</label>
</div>
<img src="{!! 'img/pix1.jpg' !!}"   height="125" width="250">
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-4">
         
         <div class="radio ">
  <label  ><input  name="course" type="radio" onclick="cc()">Cartao de Credito</label>
</div>
<img src="{!! 'img/b6.jpg' !!}"   height="100" width="200">
</div>
<div class="col-4">      

<div class="radio ">
  <label  ><input name="course" type="radio" onclick="cd()">Cartao de Debito</label>
</div>
<img src="{!! 'img/b1.jpg' !!}"   height="100" width="200">
</div>
<div class="col-4">
           
<div class="radio ">
  <label  ><input  name="course" type="radio" onclick="bb()">Boleto Bancario</label>
</div>
<img src="{!! 'img/b5.png' !!}"    height="100" width="200">
</div>
</div>
</div>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-6">
           
<div class="radio ">
  <label  ><input name="course" type="radio" onclick="py()">PayPal</label>
</div>
<img src="{!! 'img/paypal.jpg' !!}"   height="125" width="250">
</div>
<div class="col-6">
            
<div class="radio ">
  <label  ><input name="course" type="radio" onclick="mp()">Mercado Pago</label>
</div>
<img src="{!! 'img/mercadopago.jpg' !!}"   height="125" width="250">
</div>
</div>
</div>

<br>
<br>


</form>






@stop
