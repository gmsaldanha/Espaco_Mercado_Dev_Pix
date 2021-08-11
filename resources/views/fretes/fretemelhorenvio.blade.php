<?PHP
use Illuminate\Http\Request;
use GuzzleHttp\Client;

/*$token ='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8';
$tokenParts = explode('.', $token);

$tokenHeader = json_decode(base64_decode($tokenParts[0]));
$tokenPayload = json_decode(base64_decode($tokenParts[1]));
$tokenSignature = $tokenParts[2];
$tokenExpirationDate = date('l jS \of F Y h:i:s A', $tokenPayload->exp);
echo "Vencimento do Token $tokenExpirationDate";


$client = new Client();
$response = $client->get('https://api.melhorenvio.com.br/v1/shipping/services', [
    'auth' => ['n33cnPPLI8FoXdsZdJo7PXvRTzGJzhUFMZWKeqGT', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8']
  ]);
if ($response->getStatusCode() === 200) {
    echo $response->getBody();
}
$response1 = json_decode($response->getBody(), true);


*/




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.melhorenvio.com.br/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('grant_type' => 'authorization_code','client_id' => '1984','client_secret' => 'qxzlOpYQNGMd6DFPKW3ayHHYL2dQ0Mgn9ZC02cby','redirect_uri' => 'https://sandbox.melhorenvio.com.br/callback','code' => 'code'),
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'User-Agent: Teste_de_Envio (gmscomputadores@bol.com.br)'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

//dd($response1);

/*
$client = new Client();
$response = $client->post('https://api.melhorenvio.com.br/v1/clients', [
   // 'auth' => ['n33cnPPLI8FoXdsZdJo7PXvRTzGJzhUFMZWKeqGT', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8'],
   
   'json' => [
      'email'=> 'usuario@melhoremail.com.br', // email do usuário na sua loja
      'firstname'=>  'Nome', // Primeiro nome do usuário (opcional)
      'lastname'=>  'Sobrenome', // Sobrenome do usuário (opcional)
      'phone_1'=>  '53984470000', // Telefone celular para validação do cadastro (opcional) (colocar com ddd)
      'phone_2'=>  '5332710000', // Telefone adicional para contato, celular ou residêncial (opcional) (colocar com ddd)
      'postal_code'=>  '96040000', // CEP (opcional)
      'address'=>  'Rua Marechal Floriano', // Endereço (opcional)
      'number'=>  '100', // Número da casa  (opcional)
      'district'=>  'Centro', // Bairro (opcional)
      'city'=>  'Pelotas', // Cidade (opcional)
      'uf'=>  'RS', // UF (opcional)
      'complement'=>  '', // Complemento do endereço (opcional)
      'birthdate'=>  '1990-12-01', // Data de nascimento (opcional)
      'cpf'=>  '', // CPF do usuário (opcional)
      'cnpj'=>  '', // CNPJ da empresa do usuário (opcional)
      'cupom'=>  '' // Nome de um cupom de desconto (opcional)

    ]




  ]);
if ($response->getStatusCode() === 200) {
    echo $response->getBody();
}

echo "*****************************************";
$client = new Client();
$response = $client->post('https://www.melhorenvio.com.br/api/v2/me/shipment/calculate', [
    'auth' => ['n33cnPPLI8FoXdsZdJo7PXvRTzGJzhUFMZWKeqGT', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8'],
  
    'json' => [
      'from' => [
          "postal_code" => '35528899',
          "address" => '',
          "number" => ''
      ],
      'to' => [
          "postal_code" => '29056905',
          "address" => '',
          "number" => ''
      ],
      'package' => [
          "weight" => '20',
          "width" => '20',
          "height" => '20',
          "length" => '20'
      ],
      'options' => [
          "insurance_value" => '0.5',
          "receipt" => '1' == 1 ? true : false,
          "own_hand" => '1' == 1 ? true : false,
          "collect" => false
      ],
      "services" => "1,2"
  ] 
  ]);

  $response = json_decode($response->getBody());
//if ($response->getStatusCode() === 200) {
    echo $response;



echo "*****************************************";

/* exemplo autorizacao 
curl \
-X GET \
-u 'API_KEY:SECRET_TOKEN' \
'https://api.melhorenvio.com.br/v1/shipping/services'






exemplo clientes
curl \
-X POST \
-u 'API_KEY:SECRET_TOKEN' \
-H 'Content-Type: application/json;charset=UTF-8' \
-d '{"email":"usuario@melhoremail.com.br","firstname":"Nome","lastname":"Sobrenome","phone_1":"53984470000","phone_2":"5332710000","postal_code":"96040000","address":"Rua Marechal Floriano","number":"100","district":"Centro","city":"Pelotas","uf":"RS","birthdate":"1990-12-01"}' \
'https://api.melhorenvio.com.br/v1/clients'
*/
/*
$client = new Client();
$response1 = $client->post('https://api.melhorenvio.com.br/v1/clients', [
  'auth' => ['n33cnPPLI8FoXdsZdJo7PXvRTzGJzhUFMZWKeqGT', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8'],

  'payload' => [
    'email'=> 'usuario@melhoremail.com.br', // email do usuário na sua loja
  'firstname'=>  'Nome', // Primeiro nome do usuário (opcional)
  'lastname'=>  'Sobrenome', // Sobrenome do usuário (opcional)
  'phone_1'=>  '53984470000', // Telefone celular para validação do cadastro (opcional) (colocar com ddd)
  'phone_2'=>  '5332710000', // Telefone adicional para contato, celular ou residêncial (opcional) (colocar com ddd)
  'postal_code'=>  '96040000', // CEP (opcional)
  'address'=>  'Rua Marechal Floriano', // Endereço (opcional)
  'number'=>  '100', // Número da casa  (opcional)
  'district'=>  'Centro', // Bairro (opcional)
  'city'=>  'Pelotas', // Cidade (opcional)
  'uf'=>  'RS', // UF (opcional)
  'complement'=>  '', // Complemento do endereço (opcional)
  'birthdate'=>  '1990-12-01', // Data de nascimento (opcional)
  'cpf'=>  '', // CPF do usuário (opcional)
  'cnpj'=>  '', // CNPJ da empresa do usuário (opcional)
  'cupom'=>  '' // Nome de um cupom de desconto (opcional)
  ]
 ]);
 

if ($response1->getStatusCode() === 200) {
    echo $response1->getBody();
}






/*$curl = curl_init();
 curl_setopt_array($curl, array(
   CURLOPT_URL => 'https://sandbox.melhorenvio.com.br/oauth/authorize?client_id=1984&redirect_uri=http://pagamentos.test/callback&response_type=code&state=teste&scope=cart-read cart-write companies-read companies-write coupons-read coupons-write notifications-read orders-read products-read products-write purchases-read shipping-calculate shipping-cancel shipping-checkout shipping-companies shipping-generate shipping-preview shipping-print shipping-share shipping-tracking ecommerce-shipping transactions-read users-read users-write',
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => '',
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 0,
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'POST',
   //CURLOPT_POSTFIELDS => array('grant_type' => 'authorization_code',
   //'client_id' => '1984',
   //'client_secret' => 'qxzlOpYQNGMd6DFPKW3ayHHYL2dQ0Mgn9ZC02cby',
   //'redirect_uri' => 'http://pagamentos.test/fretes/callback',
   //'code' => 'code',
   //'sandbox' => 'true'),
   CURLOPT_HTTPHEADER => array(
   // 'Authorization' =>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRmYzNiYzMwOTEzZjc3OTE0MjY2YmZiZGYyYmJlNjU0OWExYmM2ODI4YzBiNzU2MDE0NDQwZWJjZmUxNTdlZTEyMDAyMzA2MjliNmQ3OGZjIn0.eyJhdWQiOiI5NTYiLCJqdGkiOiI0ZmMzYmMzMDkxM2Y3NzkxNDI2NmJmYmRmMmJiZTY1NDlhMWJjNjgyOGMwYjc1NjAxNDQ0MGViY2ZlMTU3ZWUxMjAwMjMwNjI5YjZkNzhmYyIsImlhdCI6MTYyNjgwODQ0NiwibmJmIjoxNjI2ODA4NDQ2LCJleHAiOjE2NTgzNDQ0NDYsInN1YiI6IjQwZDA3ZTllLTAwMjktNDRmYy04ZWZiLTNkNWRiMGRiOThjZCIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.Jtt2mog_CpYLz3mNcXuXmHZ-PuUF4EFJGGkbf_tIurImwP4Ms3HreQecPkhYl4A-HeS9jPOOgpabEM0vgV8biHAsNBh-gQfZMZXqnyfNo3uJDSSlJlJVT-VWw1wQpVzf9hdgeAhIbbo2HPKP3zNLytYETGRYo3c39et--gTtqBlWRUizNohV3uap8gtjLKKFZ1sbCi4ZwbxgVo5mPAOQuR2MyMhnQ0EyZdStdPVgidEu9_dtDWNka3M_I_zHC5F46AAiJl1VTTyIz2GrfpqFxW-KOL4QE2DJchSH1iAHuzKtVtKeiw0QwgTXreP4LWzeF0G2tBTHFPUt6MaHCR_AF1XtkvKjt2R-JaR2DemT-mnBflpN1qNIqEUpijYd5oThR3K7rtwUwLdbllwLpIhu2AV3GQnfqqTdlncLcxEycnq9jlViWXFiWf5Qg7UQdD7NguIrcUTh7orvG7ZJ3R3rz6CVcEhSxhFSuGvu1DrtDfVDB0WeQgIl7f3_NNlUJfZ3sCA5VZIJhTLf7lfuW1qBbMsbD5EUjXHBP_TLsCuATGRzuwmS9LznzS1tGW31d857oPYlcW0ML8AwgxMteejSZxNQFldP1nNXOD9r0SRfKeeMe6oDej1rB1dtGuWZi4KGsn2nYYZrpx5lDf5yb4NmrdcbFdq6rnjATM5BzSkQR3A',
   // 'Accept' =>' application/json',
   // 'Content-Type' =>'application/json'
    //'User-Agent' =>' Teste_de_envio (gmscomputadores@bol.com.br)'
    ),
 )); 
 $response = curl_exec($curl);
 $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

  //dd($response);
 curl_close($curl);


 //echo $response;
echo '/////////////////////////////////////////////';

/*



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.melhorenvio.com.br/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('grant_type' => 'authorization_code','client_id' => '1984','client_secret' => 'qxzlOpYQNGMd6DFPKW3ayHHYL2dQ0Mgn9ZC02cby','redirect_uri' => 'https://www.sandbox.melhorenvio.com.br/','code' => 'code','sandbox' => 'true'),
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'User-Agent: Teste_de_envio (gmscomputadores@bol.com.br)',
    'Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8'
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;


echo "****************************************";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ' https://www.melhorenvio.com.br/oauth/authorize?client_id=4890&redirect_uri=https://melhorenvio.com.br/&response_type=code&state=teste&scope=cart-read cart-write companies-read companies-write coupons-read coupons-write notifications-read orders-read products-read products-write purchases-read shipping-calculate shipping-cancel shipping-checkout shipping-companies shipping-generate shipping-preview shipping-print shipping-share shipping-tracking ecommerce-shipping transactions-read users-read users-write');
curl_setopt( $ch, CURLOPT_HTTPHEADER,[
    'Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8',
    'User-Agent:Teste_de_envio (gmscomputadores@bol.com.br)' 
  
      ]);


curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo "$response";
echo "$httpcode";





//$transportadors->Url_transp;//'https://oauth.hm.bb.com.br/oauth/token';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ' https://www.melhorenvio.com.br/oauth/token');
curl_setopt( $ch, CURLOPT_HTTPHEADER,[
  'Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8',
  'User-Agent:Teste_de_envio (gmscomputadores@bol.com.br)' , 
  'Accept:application/json',
  'Content-type:application/json'

    ]);


curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [ 'grant_type:authorization_code',  
    'client_id:4890',
    'client_secret:n33cnPPLI8FoXdsZdJo7PXvRTzGJzhUFMZWKeqGT',
'redirect_uri:https:https://melhorenvio.com.br/',
    'request_scope:cart-read cart-write companies-read companies-write coupons-read coupons-write notifications-read orders-read products-read products-write purchases-read shipping-calculate shipping-cancel shipping-checkout shipping-companies shipping-generate shipping-preview shipping-print shipping-share shipping-tracking ecommerce-shipping transactions-read users-read users-write webhooks-read webhooks-write',
   'code:code'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// process and return the response
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
//$response = json_decode($response, true);
//$data = json_decode(curl_exec($ch),true); 

//dd($response);

//$token = $response['access_token'];



echo "$response";
echo "$httpcode";
//echo "$token";















/*

$endpoint = 'https://melhorenvio.com.br/oauth/token'; //$transportadors->Url_transp;//'https://oauth.hm.bb.com.br/oauth/token';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt( $ch, CURLOPT_HTTPHEADER,[
  'Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8',
  'Accept:application/json',
  'Content-type:application/json',
  'User-Agent:Teste de envio (gmscomputadores@bol.com.br)'
    ]);


curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [ 'grant_type:authorization_code',  
    'client_id:4890',
    'client_secret:n33cnPPLI8FoXdsZdJo7PXvRTzGJzhUFMZWKeqGT',
    //'sandbox: true',
    //'bearer: eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNiNTJmY2VlNzYzMjg3MzFiMDM0N2QwMDc1OTE4M2FhNTE1NTk1NTEzN2ZkZDI4OWNkNDA3YzBjY2QyYzkyMTc2MWNhZDM3NzgyMmZjMjBkIn0.eyJhdWQiOiI5NTYiLCJqdGkiOiIzYjUyZmNlZTc2MzI4NzMxYjAzNDdkMDA3NTkxODNhYTUxNTU5NTUxMzdmZGQyODljZDQwN2MwY2NkMmM5MjE3NjFjYWQzNzc4MjJmYzIwZCIsImlhdCI6MTYyNjQzNzIzMywibmJmIjoxNjI2NDM3MjMzLCJleHAiOjE2NTc5NzMyMzMsInN1YiI6IjQwZDA3ZTllLTAwMjktNDRmYy04ZWZiLTNkNWRiMGRiOThjZCIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.uJ-SG-A9COduyWbFecXMdOZlNNyzxgaFG_Tj94Cp4A_PjRoQHwz4Xk13H0OwntFVXrW8XtMC-AOvLOhM5CGld6ocL5dpFHZ84m-3xb0dNpyFDn1KNH9WP1230qhhzkmg21MfqhrMPbtIFa7d40rboMyv9oBXmX9Rso4pZkCptPQzvoQ-kMGuSUxpYL--yD1_Bs-GHdPLhVvzNWorrOqiOvkBG1hXsYqanKfDBkw2VNZHSYsU7D4ngcV6u0URoOniTS9w4MrCmGVIPmbs6DU1ZbP44Uutxv6slpRfWSS7r46-6eZhhg4UfvJBwTYOi1Fnj49rMgwoGI1c_-HMTbVcePzdbe7oysDUV3xgwii2lVYv1ydnf89ms8ePBzbimmZL5Rxf-RrPhg9p4hrReNgNO1DHu1OdepVXi45qoZPAGhOcOd_wEEvSgnhUj_ZMedO0kJVqK4NJ34kzH7B6h1xyox_L0WjApACNrsBvXwvVtzQ2F09vVdb8vwIcafEtYVeXRhEPaN1mU4l7pqOZkCURW0EhlkFysY5wXQj3ArAw_2f9ma0vsSL79uijkHvEAdM6K0VWjSYsndNwLv1rdJEx5sA4AEs59WY2VoS40H94b4HNhregUovRrG3Ss5awqjqHoR-oqHankd_KbMJNJq60xtVG8aLVSQHCON6Ln_TiR9M',
    'redirect_uri:https://gmssolutions.com.br/loja/callback.php',
    //'request_scope:cart-read cart-write companies-read companies-write coupons-read coupons-write notifications-read orders-read products-read products-write purchases-read shipping-calculate shipping-cancel shipping-checkout shipping-companies shipping-generate shipping-preview shipping-print shipping-share shipping-tracking ecommerce-shipping transactions-read users-read users-write webhooks-read webhooks-write',
    'code:code']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// process and return the response
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
//$response = json_decode($response, true);
//$data = json_decode(curl_exec($ch),true); 

//dd($response);

//$token = $response['access_token'];



echo "$response";
//echo "$token";





/*
$AuthorizationPut ='Authorization: Bearer '.$token ;

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $Putpoint.$apikey.$GetPoint,
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
dd($responseput);
*/


?>



  


