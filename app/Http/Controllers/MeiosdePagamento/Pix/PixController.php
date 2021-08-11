<?php



namespace App\Http\Controllers\MeiosdePagamento\Pix;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pix\PixModel;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output\Png;
use function Psy\debug;
use Illuminate\Support\Facades\DB;
use App\Models\Responses\PspModel;
use App\Models\ContasBancarias\ContasModel;
use App\Models\ContasBancarias\TransacoesModel;
use Safe2Pay\API\PaymentRequest;
use Safe2Pay\Models\Payment\BankSlip;
use Safe2Pay\Models\Transactions\Transaction;
use Safe2Pay\Models\General\Customer;
use Safe2Pay\Models\General\Product;
use Safe2Pay\Models\General\Address;
use Safe2Pay\ Models\Core\Config as Enviroment;

class PixController extends Controller
{

public function qrcodedinamicosafe2pay(Request $request)
{

        $contas = DB::table('contas_models')->select('CodigoPix','Titular','Municipio','TxId')->first() ;
        $psps = DB::table('psp_models')->select('id_banco','EndPoint','GetPoint',
        'PutPoint','grant_type','scope','Content_Type','Authorization')->first() ;





    $cpf = $request->input('variavelcpf');
    $nome = $request->input('variavelnome');  
    $vlvalor = $request->input('variavelvalor');
    $mensagem = $request->input('mensagem');

$dadospix = array('IsSandbox' => false,'Application' =>'Aplicacao de teste',
'Vendor' =>$contas->Titular,'CallbackUrl' => 'http://pagamentos.test/meiosdepagamento/responses/pixrecebidos',
'PaymentMethod' =>'6','Reference' => 'TESTE',
'Customer' =>array('Name' => 'chico xavier','Identity' =>'75421780678','Phone' =>'51999999999','Email' =>'safe2pay@safe2pay.com.br',
'Address'=> array('ZipCode' =>'00000000','Street'=>'Logradouro','Number' => '123',
'Complement' => 'Complement','District' =>'District', 'CityName' =>'Porto Alegre', 'StateInitials' =>'RS','CountryName' =>'Brasil'

)
),'Products' => array( array('Code' =>'001','Description' => 'TESTE DE VENDA','UnitPrice' =>0.01, 'Quantity' =>1 ))
);
//$dadospix1 = $dadospix+ array('Products' => array(array('Code' =>'001','Description' => 'TESTE DE VENDA','UnitPrice' =>0.01, 'Quantity' =>1 )));
$dadospixencode = json_encode($dadospix);

$payload =$dadospixencode;

var_dump($payload);
          
$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=>"X-API-KEY: 4BF35E744E1C413BA99247EB007D68E4\r\n" .
              "Content-type: application/json\r\n",
    'content'=> $payload
  )
);

$context = stream_context_create($opts);

$result = file_get_contents('https://payment.safe2pay.com.br/v2/Payment', false, $context);

if ($result === FALSE) { /* Handle error */ }
//dd($result);
  //var_dump($result);


  $data = json_decode($result); 
 print_r($data);




$QrCode = $data->ResponseDetail->QrCode;
$IdTransaction = $data->ResponseDetail->IdTransaction;
//dd($IdTransaction);
 // $contas = DB::table('contas_models')->select('CodigoPix','Titular','Municipio','TxId')->first() ;

  

  return view('/meiosdepagamento.pix.qrcode',compact(['IdTransaction','QrCode','result','payload','vlvalor','psps','contas']));
       



}




  public function generatePix(Request $request)

    {  
$contas = DB::table('contas_models')->select('CodigoPix','Titular','Municipio','TxId')->first() ;
           
     $vlvalor = $request->input('variavelvalor');
     $mensagem = $request->input('mensagem');


     //mudando aqui para pegar o resultado bb teste
     $cpf = $request->input('variavelcpf');
     $nome = $request->input('variavelnome');
  
        $pix = new PixModel();
       //abaixo estou trocando a minha chave pix por uma exemplo do bb
        $pix->setPixKey($contas->CodigoPix);
        $pix->setDescription($mensagem);
        $pix->setMerchantName($contas->Titular);
        $pix->setMerchantCity($contas->Municipio);
        $pix->setAmount($vlvalor);
        $pix->setTxid($contas->TxId);
        $payload = $pix->getPayload();


       //endereco qrcode oficial p/ consulta
        //gerarqrcodepix.com.br/api/v1?nome=Cecília Devêza&cidade=Ouro Preto&saida=qr&chave=2aa96c40-d85f-4b98-b29f-d158a1c45f7f
      

       $qrCode = new QrCode($payload);
       $output = (new Png)->output($qrCode, 200);



///////////////////aqui implementando cobranca direta
//$contas = DB::table('contas_models')->select('id')->first() ;
$psps = DB::table('psp_models')->select('id_banco','EndPoint','GetPoint',
'PutPoint','grant_type','scope','Content_Type','Authorization')->first() ;





//atenção aqui o $CodigoPix é a nossa chave pix mas no banco brasil ja tem preexistentes de teste
/*$Codigopix =$contas->CodigoPix;

//gerando token
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
dd($response);
$token = $response['access_token'];

echo "$token";
//gerando a cobranca
$Putpoint = $psps->PutPoint;//'https://api.hm.bb.com.br/pix/v1/cob/?gw-dev-app-key=d27b477900ffab60136de17d30050956b9c1a5bc';
$AuthorizationPut ='Authorization: Bearer '.$token ;



//criei uma variavel p/ carregar os dados no json
$json ='{
  "calendario": {
    "expiracao": "36000"
  },
  "devedor": {
    "cpf": "'.$cpf.'",
    "nome": "'.$nome.'"
  },
  "valor": {
    "original": "'.$vlvalor.'"
  },
  "chave": "'.$Codigopix.'",
  "solicitacaoPagador": "'.$mensagem.'"
}';

//$txid = $txidretorno;

///////////realizando a consulta

$apikey = $psps->GetPoint;

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.bb.com.br/pix/v1/cobqrcode/?gw-dev-app-key='.$apikey,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>$json,
  CURLOPT_HTTPHEADER => array(
    $AuthorizationPut  ,
        'Content-Type: application/json'
  ),
));
$responseput = curl_exec($curl);
$data = json_decode(curl_exec($curl),true); 

curl_close($curl);
     
///////////////////////////////////////


print_r($responseput);     

//$txidretorno =  $data['txid'];*/

//return view('/meiosdepagamento.pix.qrcode',compact(['payload','vlvalor','psps','contas','txidretorno']));
        
return view('/meiosdepagamento.pix.qrcode',compact(['payload','vlvalor','psps','contas']));
               
    }  


    public function endpointspix()
    {
      $contas = DB::table('contas_models')->select('id')->first() ;
      $psps = DB::table('psp_models')->select('id_banco','EndPoint',
      'PutPoint','grant_type','scope','Content_Type','Authorization')->first() ;
   return isset($contas) 
        ? view('meiosdepagamento/contasbancarias.consultastoken', compact(['contas','psps'])) 
        : redirect()->route('meiospag');
    }

    public function pixrecebidos(Request $request){   
    $transacoes = transacoesModel::all();
     $contas = DB::table('contas_models')->select('id')->first() ;
     $psps = DB::table('psp_models')->select('id_banco','EndPoint',
     'PutPoint','GetPoint','grant_type','scope','Content_Type','Authorization')->first() ;
     $IdTransaction = $request->input('IdTransaction'); 
   

     return view('meiosdepagamento/responses.pixrecebidos', compact(['contas','psps','IdTransaction'])) ;
      

  }  
}