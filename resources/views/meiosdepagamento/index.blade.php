@extends('adminlte::page')
@section('title', 'Espaço Mercado')
@section('content_header')

<script> 
function qrcodedinamicosafe2pay(){  
  location.href = "{{ 'qrcodedinamicosafe2pay'  }}";
  document.formulario.submit();
}    

function consultatransacoes(){  
  location.href = "{{ 'consultatransacoes'  }}";
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
function calcularfrete(){
  location.href = "{{ 'cotacaofrete' }}";  
  document.formulario.submit();  
}

</script>

<h3>Insira um valor no campo abaixo</h3>
<h3>Isso irá simular uma variavel com R$</h3>
<form name="test" action="qrcodedinamicosafe2pay" method="get"> 
@csrf

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
      
      </div>

</form>
  <h3>Envios disponíveis</h3>


 <!--  informacoes para o frete !-->

<h3>Informacoes do Frete    de um cliente ja cadastrado</h3>

<form onsubmit="cleanMask()" action="{{ route('fretes') }}" method="get">
        @csrf
       <div class="form-row">


       <div class="form-group col-md-3">
          <label for="variavelnossocep">Nosso Cep</label>
          <input type="text" class="form-control" name="variavelnosssocep" >
       </div>
       <div class="form-group col-md-3">
          <label for="variavelcep">Cep Comprador</label>
          <input type="text" class="form-control" name="variavelcep">
       </div>   

       <div class="form-group col-md-6">
          <label for="variavelvlfrete">Valor frete </label>
          <input type="text" class="form-control" name="variavelvlfrete" >
       </div>
     


       <h3>Dados do produto ja vindo do banco de dados</h3>
       <!-- Informacoes do Produto !-->
       <div class="form-group col-md-8">
          <label for="variavelproduto">Produto</label>
          <input type="text" class="form-control" name="variavelproduto" id="variavelproduto" >
       </div>
       <div class="row">
            <div class="form-group col-md-4">
                <label for="variavelaltura">Altura(cm)</label>
                <input type="text" class="form-control" name="variavelaltura" id="variavelaltura" >
            </div>
            <div class="form-group col-md-4">
                <label for="variavellargura">Largura(cm)</label>
                <input type="text" class="form-control" name="variavellargura" id="variavellargura" >
            </div>
            <div class="form-group col-md-4">
                <label for="variavelcomprimento">Comprimento(cm)</label>
                <input type="text" class="form-control" name="variavelalcomprimento" id="variavelcomprimento" >
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-3">
                <label for="variavelpeso">Peso(kg)</label>
                <input type="text" class="form-control" name="variavelpeso" id="variavelpeso" >
            </div>

            <div class="form-group col-md-3">
                <label for="variavelseguro">Valor Segurado</label>
                <input type="text" class="form-control" name="variavelseguro" id="variavelseguro" >
            </div>

            <div class="form-group col-md-3">
                <label for="variavelseguro">Calcular</label>
                <input class="btn btn-primary" type="submit" onclick="calcularfrete()" value="calculafrete">
            </div>
        </div>


        </div>

        </form>

        <div id="here">
<iframe name="InlineFrame1" id="InlineFrame1" width="98%" height="96%" src="fretes" frameborder="0" target="_parent" align="left" border="0" scrolling="yes" marginwidth="1" marginheight="1"></iframe>
</div>



        
<h3>Escolha a forma de pagamento</h3>
<div class="radio ">
  <label  ><input name="course" type="radio" onclick="qrcodedinamicosafe2pay()">Pagamento Pix Safe2Pay</label>
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



            
<form name="test" action="consultatransacoes" method="get"> 
<div class="row">

<div class="form-group col-md-2">
          <label for="idconsulta">ID da Consulta</label>
          <input type="text" class="form-control" name="idconsulta" id="idconsulta" >
            </div>
            
                            
<button type="submit" class="btn btn btn-primary" >Consultar</button>
</div>
</div>  

</form> 


<form name="test1" action="consultatodastransacoes" method="get">   

<div class="form-group col-md-3">
<button type="submit" class="btn btn btn-primary" >Consultar Todas</button>
</div>



<div class="form-group col-md-3" >  
           <a href="/" class="btn btn btn-primary" >Retornar a Tela Principal</a>
         </div>
</div>         
</form> 





</div>
</div>

<br>
<br>

@endsection




