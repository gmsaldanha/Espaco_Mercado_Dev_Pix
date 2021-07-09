<?php
//require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: OAuth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\CobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$inicio = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | 
$fim = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | 
$cpf = "cpf_example"; // string | 
$cnpj = "cnpj_example"; // string | 
$location_presente = true; // bool | 
$status = "status_example"; // string | 
$paginacao_pagina_atual = 0; // int | 
$paginacao_itens_por_pagina = 100; // int | 


try {
    $result = $apiInstance->cobGet($inicio, $fim, $cpf, $cnpj, $location_presente, $status, $paginacao_pagina_atual, $paginacao_itens_por_pagina);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CobApi->cobGet: ', $e->getMessage(), PHP_EOL;
}

// Configure OAuth2 access token for authorization: OAuth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\CobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CobSolicitada(); // \Swagger\Client\Model\CobSolicitada | Dados para geração da cobrança imediata.

try {
    $result = $apiInstance->cobPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CobApi->cobPost: ', $e->getMessage(), PHP_EOL;
}

// Configure OAuth2 access token for authorization: OAuth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\CobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$txid = new \Swagger\Client\Model\TxId(); // \Swagger\Client\Model\TxId | 
$revisao = new \Swagger\Client\Model\Revisao(); // \Swagger\Client\Model\Revisao | 

try {
    $result = $apiInstance->cobTxidGet($txid, $revisao);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CobApi->cobTxidGet: ', $e->getMessage(), PHP_EOL;
}

// Configure OAuth2 access token for authorization: OAuth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\CobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CobRevisada(); // \Swagger\Client\Model\CobRevisada | Dados para geração da cobrança.
$txid = new \Swagger\Client\Model\TxId(); // \Swagger\Client\Model\TxId | 

try {
    $result = $apiInstance->cobTxidPatch($body, $txid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CobApi->cobTxidPatch: ', $e->getMessage(), PHP_EOL;
}

// Configure OAuth2 access token for authorization: OAuth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\CobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CobSolicitada(); // \Swagger\Client\Model\CobSolicitada | Dados para geração da cobrança imediata.
$txid = new \Swagger\Client\Model\TxId(); // \Swagger\Client\Model\TxId | 

try {
    $result = $apiInstance->cobTxidPut($body, $txid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CobApi->cobTxidPut: ', $e->getMessage(), PHP_EOL;
}
?>