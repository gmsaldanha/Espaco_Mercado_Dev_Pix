
@section('content_header')
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div id="here">
<?php 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.safe2pay.com.br/v2/transaction/Get?Id='.$IdTransaction,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: 4BF35E744E1C413BA99247EB007D68E4'
  ),
));
$response = curl_exec($curl);
curl_close($curl);


$data = json_decode($response); 
//print_r($data);
//stdClass Object ( [ResponseDetail] => stdClass Object ( [IdTransaction] => 16901797 [Status] => 3 [Message] => Autorizado
$status = ($data->ResponseDetail->Status);
$retorno = ($data->ResponseDetail->Message);


echo "Transação $IdTransaction  Status $status Pagamento $retorno";
$IdTransaction = null;
  ?>
  <script language="JavaScript">  
  if ({{$status}} ==3){
  alert("Transação Aprovada com Sucesso"); 
   window.location = '/meiospag';
 }
  </script>
</div>

<?php

@end;