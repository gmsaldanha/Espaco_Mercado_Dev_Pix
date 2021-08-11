<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>

<div class="text-center" style="margin-top: 50px;">
    <h3>VENDA CARTAO DE CREDITO</h3>
    <?php
    $convjson = $response;
foreach ( $convjson as $vai )
{
  print_r($vai);

}
   ?>
</div>


     <ol class="breadcrumb">
     <div class="form-group col-md2">
    <a href="meiospag" class="btn btn-danger">Cancelar Venda</a>
</div>

<div class="form-group col-md-2">
    <a href="/" class="btn btn-primary">Principal</a>
    </div>
    <div class="form-group col-md-2">
    

      </div>


  </div>
    </ol>
