<?PHP


$endpoint = $psps->EndPoint;//'https://oauth.hm.bb.com.br/oauth/token';
$Content_Type = 'Content-Type:'.$psps->Content_Type;
$Authorization = 'Authorization:'.$psps->Authorization;

$auth_data = http_build_query([
    'grant_type' 	=> $psps->grant_type,
    'scope' 		=> $psps->scope
]);


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
$token = $response['access_token'];



$Putpoint = $psps->PutPoint;//'https://api.hm.bb.com.br/pix/v1/cob/?gw-dev-app-key=d27b67790dffab20136de17d50050256b991a5b3';
$AuthorizationPut ='Authorization: Bearer '.$token ;

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $Putpoint,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "calendario": {
      "expiracao": "36000"
    },
    "devedor": {
      "cpf": "12345678909",
      "nome": "Francisco da Silva"
    },
    "valor": {
      "original": "130.44"
    },
    "chave": "7f6844d0-de89-47e5-9ef7-e0a35a681615",
    "solicitacaoPagador": "Cobrança dos serviços prestados."
}',
  CURLOPT_HTTPHEADER => array(
    $AuthorizationPut  ,
        'Content-Type: application/json'  ),
));
$responseput = curl_exec($curl);
$data = json_decode(curl_exec($curl),true); 

curl_close($curl);



$ar = $data;
$convjson = $ar->pix;
if(is_array($convjson)){
foreach ( $convjson as $vai )
{
  print_r($vai->horario);
}
}

$statusoperacao = $data['status'];
$calendario = $data['calendario'];
$location = $data['location'];
$txid = $data['txid'];
$revisao = $data['revisao'];
$devedor = $data['devedor'];
$valor = $data['valor'];
$solicitacaopagador = $data['solicitacaoPagador'];
$chave = $data['chave'];
$payload1 =  '';

?>
   <form action="lancapix" method="get">   
   <input type="hidden" name="status" value={!!$statusoperacao!!} >

   <input type="hidden" name="location" value={!!$location!!} >   
   <input type="hidden" name="txid" value={!!$txid!!} >
   <input type="hidden" name="revisao" value={!!$revisao!!} >
  
   
   <input type="hidden" name="solicitacaopagador" value={!!$solicitacaopagador!!} >
   <input type="hidden" name="chave" value={!!$chave!!}} >
   <input type="hidden" name="payload1" value={!!$payload1!!} >

  
 <button type="submit" class="btn btn btn-primary" >Gravar transacao</button>
   </form>


  


