<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script> 
$(document).ready(function(){
setInterval(function() { 

$('#here').load('pixrecebidos?IdTransaction={{$IdTransaction}}'); 
}, 5000);
});

</script>
<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>



<div id="qrcode" class="container">
    <table class="table table-bordered table-striped table-sm" >
        <thead>
      <tr>   
      <td align=center>
      <h3> Após efetuar o pagamento do QrCode </h3>
<h3> Aguarde a tela de aprovação</h3>
    <img src="{{$QrCode}}"  width="300" height="400">
    </td>
    </tr>
        </thead>
        </table>
</div>


     <ol class="breadcrumb">
     <div class="form-group col-md2">
    <a href="meiospag" class="btn btn-danger">Cancelar Venda</a>
</div>
<div id="principal" class="form-group col-md-2">
    <a href="/" class="btn btn-primary">Principal</a>
    </div>
    <div id="finvenda" class="form-group col-md-2">    

      </div>










<div id="here">
<iframe name="InlineFrame1" id="InlineFrame1" width="98%" height="96%" src="pixrecebidos" frameborder="0" target="_parent" align="left" border="0" scrolling="yes" marginwidth="1" marginheight="1"></iframe>
<?php 





?>
  <?php/*
}

//{"ResponseDetail":{"IdTransaction":16824733,"Status":"3","Message":"Autorizado




?>
</div>



















 
    </ol>

<?php
/*
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
/*$token = $response['access_token'];


$txid = $txidretorno;

///////////realizando a consulta

$apikey = $psps->GetPoint;//'https://api.hm.bb.com.br/pix/v1/cob/?gw-dev-app-key=d27b477900ffab60136de17d30050956b9c1a5bc';
$AuthorizationGet ='Authorization: Bearer '.$token ;


//echo $apikey;
//echo $AuthorizationGet;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.bb.com.br/pix/v1/cobqrcode/'.$txid.'?gw-dev-app-key='.$apikey,
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
echo md5($txid);
*/

?>

</body>
</html>
