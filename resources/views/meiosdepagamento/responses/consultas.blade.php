<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>

<div class="text-center" style="margin-top: 50px;">
    <h3>CONSULTAS</h3>
    <?php
    $convjson = $data;
foreach ( $convjson as $vai )
{
  print_r($vai);

}
   ?>
</div>


     <ol class="breadcrumb">
     <div class="form-group col-md2">
    <a href="meiospag" class="btn btn-danger">Retornar</a>
</div>

<div class="form-group col-md-2">
    <a href="/" class="btn btn-primary">Principal</a>
    </div>
    <div class="form-group col-md-2">
    

      </div>


  </div>
    </ol>
