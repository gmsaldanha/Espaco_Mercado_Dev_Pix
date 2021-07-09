<?php


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


$Getpoint = $psps->GetPoint;//'https://api.hm.bb.com.br/pix/v1/cob/?gw-dev-app-key=d27b67790dffab20136de17d50050256b991a5b3';
$AuthorizationGet ='Authorization: Bearer '.$token ;
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $Getpoint,         //'https://api.hm.bb.com.br/pix/v1/?inicio&fim&paginacao.paginaAtual=1&gw-dev-app-key=d27b67790dffab20136de17d50050256b991a5b3',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    $AuthorizationGet   ),
));
$responseget = curl_exec($curl);
$data = json_decode(curl_exec($curl)); 
curl_close($curl);
print_r($responseget);
//die();
/*$convjson = $data->pix;
dd();
if(is_array($convjson)){
  $attributos = [];
foreach ( $convjson as $vai )
{
  $pagador = $vai->pagador;

  $attributos = [
    'id' => $vai->endToEndId,
    'valor' => $vai->valor,
    'cpf' => $pagador->cpf,
    'txid' => $vai->txid,
  ];


  dd($attributos);*/
#print_r($vai->endToEndId);
//print_r($vai->txid);  
#print_r($vai->valor);  
#print_r($vai->horario);  
#print_r($vai->pagador);  
//$teste =($vai->pagador=>cpf); 
//$teste =($vai->pagador=>nome); 
//print_r($vai->endToEndId->pagador->nome);  
 // dd($vai->devolucoes);  
  
//}
//}

//dd($attributos);

