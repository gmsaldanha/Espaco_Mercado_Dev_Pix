<?php

namespace App\Http\Controllers\MeiosdePagamento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Responses\PspModel;
use App\Models\ContasBancarias\ContasModel;
use App\Models\ContasBancarias\TransacoesModel;
use Safe2Pay\API\PaymentRequest;
use Safe2Pay\Models\Payment\BankSlip;
use Safe2Pay\Models\Transactions\Transaction;
use Safe2Pay\Models\Payment\CreditCard;
use Safe2Pay\Models\Payment\DebitCard;
use Safe2Pay\API\TransactionRequest;
use Safe2Pay\API\TokenizationRequest;
use Safe2Pay\Models\General\Customer;
use Safe2Pay\Models\General\Product;
use Safe2Pay\Models\General\Address;
use Safe2Pay\ Models\Core\Config as Enviroment;

class MeiospagController extends Controller
{

    public function index(){
    return view('/meiosdepagamento.index');        
    }

    public function pay(){
    return view('meiosdepagamento.pay');        
    }

    public function qrcode(){
    return view('meiosdepagamento.qrcode');        
    }


    public static function consultatransacoes(Request $request){
        { 
            $idcons = $request->input('idconsulta');
          
            $enviroment = new Enviroment();
            $enviroment->setAPIKEY('772150B9F855463184881A5A9387C768');
                    
            $Id=$idcons;


            $opts = array(
                'http'=>array(
                  'method'=>"GET",
                  'header'=>"X-API-KEY: 772150B9F855463184881A5A9387C768"
                )
              );
              
              $context = stream_context_create($opts);
              
              $result = file_get_contents("https://api.safe2pay.com.br/v2/transaction/Get?Id=".$Id, false, $context);
              
              if ($result === FALSE) { /* Handle error */ }

              $data = json_decode($result); 

//print_r($data);
              




           
 
            return view('meiosdepagamento.responses.consultas',compact(['data']));         
                 
           
        }
    }


    public static function consultatodastransacoes(Request $request){
        { 
            
          
            $enviroment = new Enviroment();
            $enviroment->setAPIKEY('772150B9F855463184881A5A9387C768');
                    
               $opts = array(
                'http'=>array(
                  'method'=>"GET",
                  'header'=>"X-API-KEY: 772150B9F855463184881A5A9387C768"
                )
              );
              
              $context = stream_context_create($opts);
              
              $result = file_get_contents("https://api.safe2pay.com.br/v2/Transaction/List?RowsPerPage=1000", false, $context);
              
              if ($result === FALSE) { /* Handle error */ }
              
              var_dump($result);


              $data = json_decode($result); 

//print_r($data);
              




           
 
            return view('meiosdepagamento.responses.consultas',compact(['data']));         
                 
           
        }
    }






    public function bb(Request $request){
    
      $contas = DB::table('contas_models')->select('id')->first() ;
      $psps = DB::table('psp_models')->select('id_banco','EndPoint',
     'PutPoint','grant_type','scope','Content_Type','Authorization')->first() ;
     

      $enviroment = new Enviroment();
      $enviroment->setAPIKEY('772150B9F855463184881A5A9387C768');
    
    
      $vlvalor = $request->input('variavelvalor');
      $mensagem = $request->input('mensagem');
      $cpf = $request->input('variavelcpf');
      $nome = $request->input('variavelnome');
    
    
      
      ///Inicializar m??todo de pagamento
      $payload  = new Transaction();
      //Ambiente de homologa????o
      $payload->setIsSandbox(true);
      //Descri????o geral 
      $payload->setApplication("Teste SDK PHP");
      //Nome do vendedor
      $payload->setVendor("Jo??o da Silva");
      //Url de callback
      $payload->setCallbackUrl("http://pagamentos.test/fretes/callback/callbackret");
      
      //C??digo da forma de pagamento
      // 1 - Boleto banc??rio
      // 2 - Cart??o de cr??dito
      // 3 - Criptomoeda
      // 4 - Cart??o de d??bito 
      $payload->setPaymentMethod("1");
      
      //Informa o objeto de pagamento
      $BankSlip = new BankSlip();
      //Data de vencimento
      $BankSlip->setDueDate("16/08/2021");
      //Instru????o
      $BankSlip->setInstruction("Instru????o de Exemplo");
      //Multa
      $BankSlip->setPenaltyRate(2.00);
      //Juros
      $BankSlip->setInterestRate(4.00);
      //Cancelar ap??s o vencimento
      $BankSlip->setCancelAfterDue(false);
      //Pagamento parcial
      $BankSlip->setIsEnablePartialPayment(false);
      //Mensagens
      $BankSlip->setMessage(array(
          "mensagem 1",
          "mensagem 2",
          "mensagem 3"
      ));
      
      //Objeto de pagamento - para boleto banc??rio
      $payload->setPaymentObject($BankSlip);
      
      $Products = array();
      
       $payloadProduct = new Product();
       $payloadProduct->setCode(1);
       $payloadProduct->setDescription("Produto 1");
       $payloadProduct->setUnitPrice(2.50);
       $payloadProduct->setQuantity(2);
      
       array_push($Products, $payloadProduct);
      
      $payload->setProducts($Products);
      
      //Customer
      $Customer =  new Customer();
      $Customer->setName("Teste Cliente");
      $Customer->setIdentity("01579286000174");
      $Customer->setEmail("Teste@Teste.com.br");
      $Customer->setPhone("51999999999");
      
      $Customer->Address = new Address();
      $Customer->Address->setZipCode("90620000");
      $Customer->Address->setStreet("Avenida Princesa Isabel");
      $Customer->Address->setNumber("828");
      $Customer->Address->setComplement("Lado B");
      $Customer->Address->setDistrict("Santana");
      $Customer->Address->setStateInitials("RS");
      $Customer->Address->setCityName("Porto Alegre");
      $Customer->Address->setCountryName("Brasil");
      
      
      $payload->setCustomer($Customer);
      
      $response  = PaymentRequest::CreatePayment($payload);
return view('meiosdepagamento.bb.bb',compact(['payload','vlvalor','psps','contas','response']));         
    
    
    
    }









    public function cc(Request $request){

        $contas = DB::table('contas_models')->select('id')->first() ;
        $psps = DB::table('psp_models')->select('id_banco','EndPoint',
       'PutPoint','grant_type','scope','Content_Type','Authorization')->first() ;
       
  
        $enviroment = new Enviroment();
        $enviroment->setAPIKEY('772150B9F855463184881A5A9387C768');
      
      
        $vlvalor = $request->input('variavelvalor');
        $mensagem = $request->input('mensagem');
        $cpf = $request->input('variavelcpf');
        $nome = $request->input('variavelnome');


//AQUI ESTOU TOKERIZANDO O CARTAO
         //Cria uma inst??ncia do objeto do cart??o para realizar a tokeniza????o
         $CreditCard = new CreditCard("Jo??o da Silva", "4024007153763191", "12/2019", "241", null);
         //Realiza a tokeniza????o e traz o retorno
 
         $response  = TokenizationRequest::Create($CreditCard);





         
//Inicializar m??todo de pagamento
$payload  = new Transaction();
//Ambiente de homologa????o
$payload->setIsSandbox(true);
//Descri????o geral 
$payload->setApplication("Teste SDK PHP");
//Nome do vendedor
$payload->setVendor("Jo??o da Silva");
//Url de callback
$payload->setCallbackUrl("http://pagamentos.test/fretes/callback/callbackret");
      
//C??digo da forma de pagamento
// 1 - Boleto banc??rio
// 2 - Cart??o de cr??dito
// 3 - Criptomoeda
// 4 - Cart??o de d??bito 
$payload->setPaymentMethod("2");

$CreditCard = new CreditCard("Jo??o da Silva", "4024007153763191", "12/2019", "241", 2);

//Objeto de pagamento - para boleto banc??rio
$payload->setPaymentObject($CreditCard);

$Products = array();

 $payloadProduct = new Product();
 $payloadProduct->setCode(1);
 $payloadProduct->setDescription("Produto 1");
 $payloadProduct->setUnitPrice(2.50);
 $payloadProduct->setQuantity(2);

 array_push($Products, $payloadProduct);

$payload->setProducts($Products);

//Customer
$Customer =  new Customer();
$Customer->setName("Teste Cliente");
$Customer->setIdentity("01579286000174");
$Customer->setEmail("Teste@Teste.com.br");
$Customer->setPhone("51999999999");

$Customer->Address = new Address();
$Customer->Address->setZipCode("90620000");
$Customer->Address->setStreet("Avenida Princesa Isabel");
$Customer->Address->setNumber("828");
$Customer->Address->setComplement("Lado B");
$Customer->Address->setDistrict("Santana");
$Customer->Address->setStateInitials("RS");
$Customer->Address->setCityName("Porto Alegre");
$Customer->Address->setCountryName("Brasil");



$payload->setCustomer($Customer);
      
$response  = PaymentRequest::CreatePayment($payload);
return view('meiosdepagamento.cc.cc',compact(['payload','vlvalor','psps','contas','response']));         

     }





    
    public function cd(Request $request){
        $contas = DB::table('contas_models')->select('id')->first() ;
        $psps = DB::table('psp_models')->select('id_banco','EndPoint',
       'PutPoint','grant_type','scope','Content_Type','Authorization')->first() ;
       
  
        $enviroment = new Enviroment();
        $enviroment->setAPIKEY('772150B9F855463184881A5A9387C768');
      
      
        $vlvalor = $request->input('variavelvalor');
        $mensagem = $request->input('mensagem');
        $cpf = $request->input('variavelcpf');
        $nome = $request->input('variavelnome');



       //Inicializar m??todo de pagamento
$payload  = new Transaction();
//Ambiente de homologa????o
$payload->setIsSandbox(true);
//Descri????o geral 
$payload->setApplication("Teste SDK PHP");
//Nome do vendedor
$payload->setVendor("Jo??o da Silva");
//Url de callback
$payload->setCallbackUrl("http://pagamentos.test/fretes/callback/callbackret");
     
//C??digo da forma de pagamento
// 1 - Boleto banc??rio
// 2 - Cart??o de cr??dito
// 3 - Criptomoeda
// 4 - Cart??o de d??bito 
$payload->setPaymentMethod("4");

$CreditCard = new DebitCard("Jo??o da Silva", "4024007153763191", "12/2019", "241");

//Objeto de pagamento - para boleto banc??rio
$payload->setPaymentObject($CreditCard);

$Products = array();

$Products = array();

 $payloadProduct = new Product();
 $payloadProduct->setCode(1);
 $payloadProduct->setDescription("Produto 1");
 $payloadProduct->setUnitPrice(2.50);
 $payloadProduct->setQuantity(2);

 array_push($Products, $payloadProduct);

$payload->setProducts($Products);

//Customer
$Customer =  new Customer();
$Customer->setName("Teste Cliente");
$Customer->setIdentity("01579286000174");
$Customer->setEmail("Teste@Teste.com.br");
$Customer->setPhone("51999999999");

$Customer->Address = new Address();
$Customer->Address->setZipCode("90620000");
$Customer->Address->setStreet("Avenida Princesa Isabel");
$Customer->Address->setNumber("828");
$Customer->Address->setComplement("Lado B");
$Customer->Address->setDistrict("Santana");
$Customer->Address->setStateInitials("RS");
$Customer->Address->setCityName("Porto Alegre");
$Customer->Address->setCountryName("Brasil"); 
        


        $payload->setCustomer($Customer);
      
        $response  = PaymentRequest::CreatePayment($payload);
        return view('meiosdepagamento.cd.cd',compact(['payload','vlvalor','psps','contas','response']));         
        
                    
}

public function mp(){
    return view('meiosdepagamento.mp.mp');        
}
public function py(){
    return view('meiosdepagamento.py.py');        
}









                            
}
