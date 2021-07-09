<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>

<div class="text-center" style="margin-top: 50px;">
    <h3>Pagar Pix</h3>
    {!! QrCode::size(200)->backgroundColor(255, 255, 204)->generate($payload); !!}

</div>


     <ol class="breadcrumb">
     <div class="form-group col-md2">
    <a href="meiospag" class="btn btn-danger">Cancelar Venda</a>
</div>

<div class="form-group col-md-2">
    <a href="/" class="btn btn-primary">Principal</a>
    </div>
    <div class="form-group col-md-2">
    
   <form action="FinVenda" method="get">    
   <input type="hidden" name="vlvalor" value="{{$vlvalor}}" >

    <button type="submit" class="btn btn btn-primary" >Finalizar Venda</button>
     </form>
      </div>


      <div class="form-group col-md-2">
    <a href="pixrecebidos" class="btn btn-primary">Constar Pixs</a>
    </div>
  </div>
    </ol>

<?php

//gerando token
$endpoint = $psps->EndPoint;//'https://oauth.hm.bb.com.br/oauth/token';
$Content_Type = 'Content-Type:'.$psps->Content_Type;
$Authorization = 'Authorization:'.$psps->Authorization;

$auth_data = http_build_query([
    'grant_type' 	=> $psps->grant_type,
    'scope' 		=> $psps->scope
]);

//echo $endpoint;
//echo $Content_Type;
//echo $Authorization;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
  $Content_Type,  //variavel do db
  $Authorization  //variavel do db
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $auth_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// process and return the response
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$response = json_decode($response, true);
//$data = json_decode($response);
$token = $response['access_token'];


$txid = $txidretorno;

///////////realizando a consulta

$apikey = $psps->GetPoint;//'https://api.hm.bb.com.br/pix/v1/cob/?gw-dev-app-key=d27b477900ffab60136de17d30050956b9c1a5bc';
$AuthorizationGet ='Authorization: Bearer '.$token ;


//echo $apikey;
//echo $AuthorizationGet;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.hm.bb.com.br/pix/v1/cob/'.$txid.'?gw-dev-app-key='.$apikey,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $AuthorizationGet
  ),
));
$responseget = curl_exec($curl);
$dataget = json_decode(curl_exec($curl),true); 
curl_close($curl);
$status = $dataget['status'];


print_r($responseget);    