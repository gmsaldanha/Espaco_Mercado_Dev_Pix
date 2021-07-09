<?PHP
$endpoint = 'https://oauth.hm.bb.com.br/oauth/token';
$auth_data = http_build_query([
    'grant_type' 	=> 'client_credentials',
    'scope' 		=> 'cob.read cob.write pix.read pix.write'
]);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt( $ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded',
    "Authorization: Basic ZXlKcFpDSTZJaUlzSW1OdlpHbG5iMUIxWW14cFkyRmtiM0lpT2pBc0ltTnZaR2xuYjFOdlpuUjNZWEpsSWpveE9EQTRPQ3dpYzJWeGRXVnVZMmxoYkVsdWMzUmhiR0ZqWVc4aU9qRjk6ZXlKcFpDSTZJbU14T1dFNE1EZ3RZemhsWlMwMFlUVWlMQ0pqYjJScFoyOVFkV0pzYVdOaFpHOXlJam93TENKamIyUnBaMjlUYjJaMGQyRnlaU0k2TVRnd09EZ3NJbk5sY1hWbGJtTnBZV3hKYm5OMFlXeGhZMkZ2SWpveExDSnpaWEYxWlc1amFXRnNRM0psWkdWdVkybGhiQ0k2TVN3aVlXMWlhV1Z1ZEdVaU9pSm9iMjF2Ykc5bllXTmhieUlzSW1saGRDSTZNVFl5TkRrNE5qQXhOVGsyTTMw"
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



$Putpoint = 'https://api.hm.bb.com.br/pix/v1/cob/?gw-dev-app-key=d27b67790dffab20136de17d50050256b991a5b3';
$Authorization ='Authorization: Bearer ';
$Authorization = $Authorization .$token ;
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
    $Authorization  ,
        'Content-Type: application/json'
  ),
));
$responseput = curl_exec($curl);

curl_close($curl);

print_r('----------------------------------------------');
$responseput = json_decode($responseput, true);
print_r($responseput);
print_r('----------------------------------------------');






