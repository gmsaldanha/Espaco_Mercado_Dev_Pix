<?php
//require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;

// ...
// Configure o ambiente
$environment = $environment = Environment::sandbox();

// Configure seu merchant
$merchant = new Merchant('MERCHANT ID', 'MERCHANT KEY');

// Crie uma instância de Sale informando o ID do pedido na loja
$sale = new Sale('123');

// Crie uma instância de Customer informando o nome do cliente
$customer = $sale->customer('Fulano de Tal');

// Crie uma instância de Payment informando o valor do pagamento
$payment = $sale->payment(15700);

// Defina a URL de retorno para que o cliente possa voltar para a loja
// após a autenticação do cartão
$payment->setReturnUrl('https://localhost/test');

// Crie uma instância de Debit Card utilizando os dados de teste
// esses dados estão disponíveis no manual de integração
$payment->debitCard("123", CreditCard::VISA)
        ->setExpirationDate("12/2018")
        ->setCardNumber("0000000000000001")
        ->setHolder("Fulano de Tal");

// Crie o pagamento na Cielo
try {
    // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
    $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

    // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
    // dados retornados pela Cielo
    $paymentId = $sale->getPayment()->getPaymentId();

    // Utilize a URL de autenticação para redirecionar o cliente ao ambiente
    // de autenticação do emissor do cartão
    $authenticationUrl = $sale->getPayment()->getAuthenticationUrl();
} catch (CieloRequestException $e) {
    // Em caso de erros de integração, podemos tratar o erro aqui.
    // os códigos de erro estão todos disponíveis no manual de integração.
    $error = $e->getCieloError();
}