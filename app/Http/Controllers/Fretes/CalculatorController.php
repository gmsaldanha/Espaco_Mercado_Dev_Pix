<?php

namespace App\Http\Controllers\Fretes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\QuotationFormRequest;
use App\Models\Fretes\Quotation;

class CalculatorController extends Controller
{
    private $quotation;

    public function __construct(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }

    public function index()
    {
        $last_quotations = $this->quotation->orderBy('id', 'desc')->take(5)->get();

        return view('calculator.calculator')->with(compact('last_quotations'));
    }

    public function result(QuotationFormRequest $request)
    {
       // $dataForm = $request->except('_token');
$dataForm = $request->except('test');
        $dataForm['from_cep'] = preg_replace("/[.-]/", "", $dataForm['from_cep']);
        $dataForm['to_cep'] = preg_replace("/[.-]/", "", $dataForm['to_cep']);
        $dataForm['weight'] = str_replace(",", ".", $dataForm['weight']);
        $dataForm['value'] = isset($dataForm['value']) ? str_replace(',','.',str_replace('.','',$dataForm['value'])) : 0;
        $dataForm['ar'] = !isset($dataForm['ar']) ? 0 : 1;
        $dataForm['mp'] = !isset($dataForm['mp']) ? 0 : 1;

        $insert = $this->quotation->create($dataForm);

        if($insert)
        {

            $client = new \GuzzleHttp\Client();
            $response = $client->request(
                'POST',
                'https://www.melhorenvio.com.br/api/v2/me/shipment/calculate',
                [
                    'json' => [
                        'from' => [
                            "postal_code" => $dataForm['from_cep'],
                            "address" => '',
                            "number" => ''
                        ],
                        'to' => [
                            "postal_code" => $dataForm['to_cep'],
                            "address" => '',
                            "number" => ''
                        ],
                        'package' => [
                            "weight" => $dataForm['weight'],
                            "width" => $dataForm['width'],
                            "height" => $dataForm['height'],
                            "length" => $dataForm['length']
                        ],
                        'options' => [
                            "insurance_value" => $dataForm['value'],
                            "receipt" => $dataForm['ar'] == 1 ? true : false,
                            "own_hand" => $dataForm['mp'] == 1 ? true : false,
                            "collect" => false
                        ],
                        "services" => "1,2"
                    ],
                    'headers' => [
                        "accept" => "application/json",
                        "authorization" =>  "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImUxZDU3YWNjYmI3MjA4YTU3ZjZlNjY4NGExNTdlN2E0YmQyYzIzYWFmYTE5MmFjZGViMmVhMmRjMDQ4ZjhiZWU2YjFiNjExM2ViOGI2ZWM0In0.eyJhdWQiOiIxIiwianRpIjoiZTFkNTdhY2NiYjcyMDhhNTdmNmU2Njg0YTE1N2U3YTRiZDJjMjNhYWZhMTkyYWNkZWIyZWEyZGMwNDhmOGJlZTZiMWI2MTEzZWI4YjZlYzQiLCJpYXQiOjE2MjY3OTAwMDEsIm5iZiI6MTYyNjc5MDAwMSwiZXhwIjoxNjU4MzI2MDAxLCJzdWIiOiI4MjZmMzRmYS1jYTVmLTRkMDctYmE2OS02NTI0ZDQ1ZDNiNzYiLCJzY29wZXMiOlsiY2FydC1yZWFkIiwiY2FydC13cml0ZSIsImNvbXBhbmllcy1yZWFkIiwiY29tcGFuaWVzLXdyaXRlIiwiY291cG9ucy1yZWFkIiwiY291cG9ucy13cml0ZSIsIm5vdGlmaWNhdGlvbnMtcmVhZCIsIm9yZGVycy1yZWFkIiwicHJvZHVjdHMtcmVhZCIsInByb2R1Y3RzLWRlc3Ryb3kiLCJwcm9kdWN0cy13cml0ZSIsInB1cmNoYXNlcy1yZWFkIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2FuY2VsIiwic2hpcHBpbmctY2hlY2tvdXQiLCJzaGlwcGluZy1jb21wYW5pZXMiLCJzaGlwcGluZy1nZW5lcmF0ZSIsInNoaXBwaW5nLXByZXZpZXciLCJzaGlwcGluZy1wcmludCIsInNoaXBwaW5nLXNoYXJlIiwic2hpcHBpbmctdHJhY2tpbmciLCJlY29tbWVyY2Utc2hpcHBpbmciLCJ0cmFuc2FjdGlvbnMtcmVhZCIsInVzZXJzLXJlYWQiLCJ1c2Vycy13cml0ZSIsIndlYmhvb2tzLXJlYWQiLCJ3ZWJob29rcy13cml0ZSJdfQ.wcAdEt7Y1LPLlUsO0bXCFyOaCbCrP1HRq4VUT6Za75-UHPMJTn1VC5h3SVMHz8g-3yOBHn4yMpkhuB1-jLW-AmRQYVyIiRZawU2E4p_Zjp46s77jqE4V5ezrt00Y_R6gZre8CKRG6LSZX8HbMi9ELYHixnh7OE5ivKxMiHlyKcPjmVZpBV2Pprh_JTQ97ps-RKs6jK6iVTCy-7OhYu3reqD6rXunhG5KYsmyDDi7RT8wXtfXc_XfKsdhTIReaAKtMONsG68TvtCe9ir-YQ3DRwc2BTeqfDZM8o_8seGfoBd1b2Ho0f4XH3DiybC0oWHO8k2fgeFNyVHmoX1v06zJy-y2VDVbfEFXLVjpQ17PCUDn-qnZz51w9yozGxhaB41ni5biUa34oTESowTFeLs7qMy7djBpzsayxUxWK-iZkl0NcdsGQEt6M4Zj9WKHKDuPeMVWAevxjEHwTVO9DUsFoyUWULj8CDlDgMk8-CNMaX0jWEVowb_qM3z-0j65uHmteOFgARZDPVg4DCvX_WJOGAgjUS0QZxJTyuK_HBpoco5tsjt6NSPDDM2HhweVmPG3vEXfai1cUh3-dfdNDBwHe6yHz8dGmSh20N6E7er2eKRkj-gneuZo6UZ3QdL1sLfZNbi9oUdxkIAHwCnxcPQfOkovsJhKh3ze23dyp832pz8",
                        "content-type" => "application/json"
                    ]
                ]
            );            

            $response = json_decode($response->getBody());

            return view('calculator.result')->with(compact('response'));
        }
        else
            return redirect()->route('calculator');
    }


    public function cotacaofrete(Request $request)
    {
        $tokencadastrado ='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNmZTI0MWIwNjk4ZDk5NTExNDc3ODgyMGE2MDQ3NzhjNzMwODQ0MDlhOGZkNGZjMGZjZDkzYjJkY2ExYzMyM2I0MDg0NDc2ZDAyZDM0MzFmIn0.eyJhdWQiOiI5NTYiLCJqdGkiOiJjZmUyNDFiMDY5OGQ5OTUxMTQ3Nzg4MjBhNjA0Nzc4YzczMDg0NDA5YThmZDRmYzBmY2Q5M2IyZGNhMWMzMjNiNDA4NDQ3NmQwMmQzNDMxZiIsImlhdCI6MTYyNzY2MjAzNSwibmJmIjoxNjI3NjYyMDM1LCJleHAiOjE2NTkxOTgwMzUsInN1YiI6IjQwZDA3ZTllLTAwMjktNDRmYy04ZWZiLTNkNWRiMGRiOThjZCIsInNjb3BlcyI6WyJjYXJ0LXJlYWQiLCJjYXJ0LXdyaXRlIiwiY29tcGFuaWVzLXJlYWQiLCJjb21wYW5pZXMtd3JpdGUiLCJjb3Vwb25zLXJlYWQiLCJjb3Vwb25zLXdyaXRlIiwibm90aWZpY2F0aW9ucy1yZWFkIiwib3JkZXJzLXJlYWQiLCJwcm9kdWN0cy1yZWFkIiwicHJvZHVjdHMtZGVzdHJveSIsInByb2R1Y3RzLXdyaXRlIiwicHVyY2hhc2VzLXJlYWQiLCJzaGlwcGluZy1jYWxjdWxhdGUiLCJzaGlwcGluZy1jYW5jZWwiLCJzaGlwcGluZy1jaGVja291dCIsInNoaXBwaW5nLWNvbXBhbmllcyIsInNoaXBwaW5nLWdlbmVyYXRlIiwic2hpcHBpbmctcHJldmlldyIsInNoaXBwaW5nLXByaW50Iiwic2hpcHBpbmctc2hhcmUiLCJzaGlwcGluZy10cmFja2luZyIsImVjb21tZXJjZS1zaGlwcGluZyIsInRyYW5zYWN0aW9ucy1yZWFkIiwidXNlcnMtcmVhZCIsInVzZXJzLXdyaXRlIiwid2ViaG9va3MtcmVhZCIsIndlYmhvb2tzLXdyaXRlIl19.QiqBKyiz0ztKjRPFcRuMeNPDK1hEX2uHzJk-FcL8heNsCbaI46_zXD9y__HDp5-RsDBD2vLqGlhzhlsIuuS6RgKRiCgtXVCnUIA3iKzRx7BDgkAckcOcngBOirG7CZdHsGSN06QciJeK5DFV6cnOo9Zq5jw8sssS3Udo4xkNvgDOQZ2PgEz8UurNWSctRMj0wMjZjOtkB605xRyR_yPOirmU69EFn6froyB2ocP4mJF6CAfqU4cgHr3TnzmMUt7EJF8ec4b94LfhiysXVJRbQH_WqINeCnG-VRGWzo1s-n4GxAtJDYVa9yYx2FeyQ31ma0V1ysuv2SWa2YUR4jQ7jJKzWEYBo61NgMj5OScxXOcM8YBfLClZB3XS_ypb60nmwCHAS2ZE2d9YMoEoUMn80ki55udPv2qqY4BgxTBxT-E4XNRuIoLzjFt3rYscssqln9HEhnS5yxqCP5Vp81kDHsgEYdDNz0lc3q7D0FmlMzZ1VpybbY-wz56azV2TeYhZDor6Tb6XQ7lEKjL0oGq-qVGMRc6ZbLXYtOHet_oQgUmv_HiGsgNlNoV1IHXQO2dZudXo3NRH2q7zlYrEiknf7COkvdlAczces7wdmUBz8lbRGETGFBQo_FFultp7koIJxJ9s4AngP3ldFAxzEwSkUMYTVu2CHOwl9WOKTAlHZTQ';
        $endApi = 'https://sandbox.melhorenvio.com.br';
        $userAgent = 'Teste_de_envio (gmscomputadores@bol.com.br)';
                                            
        $variavelnossocep= $request->input('variavelnosssocep');
        $variavelcep= $request->input('variavelcep');
        $variavelvlfrete= $request->input('variavelvlfrete');
        $variavelproduto= $request->input('variavelproduto');
        $variavelaltura= $request->input('variavelaltura');
        $variavellargura= $request->input('variavellargura');
        $variavelalcomprimento= $request->input('variavelalcomprimento');
        $variavelpeso= $request->input('variavelpeso');
        $variavelseguro= $request->input('variavelseguro');

       
        $envio = array('from' =>
               array('postal_code'=>$variavelnossocep));  
                         
        $envio = $envio + array('to' =>
               array('postal_code'=>$variavelcep));
                
               $envio = $envio + array('products' =>
               array(array('id'=>'X','width'=>$variavelaltura,'height'=>$variavellargura,'length'=>$variavelalcomprimento,'weight'=>$variavelpeso,'insurance_value'=>$variavelseguro,'quantity'=>1)));                
                
       




$envioencode = json_encode($envio);
//$object = json_decode($arrencode,true);

//var_dump($object);
        
       
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $endApi.'/api/v2/me/shipment/calculate',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$envioencode,
        
          CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer '.$tokencadastrado,
            'User-Agent: '.$userAgent
          ),
        ));
        
        //$response = curl_exec($curl);

        //dd($response);
        $data = json_decode(curl_exec($curl)); 


  
       
        curl_close($curl);




        return view('/meiosdepagamento.index', compact(['data','variavelnossocep','variavelcep','variavelvlfrete','variavelaltura','variavellargura','variavelalcomprimento','variavelpeso','variavelseguro']));
      //  return view('/meiosdepagamento.index')->with(compact('data'));
    
//return redirect()->route('meiospagindex')->with(compact('data'));
    
    }


    
}
