<?php

namespace App\Http\Controllers\Fretes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Fretes\TransportadoraModel;

class TransportadoraController extends Controller
{
    public function index()
    {
        $transportadors = TransportadoraModel::all();
        return view('fretes/transportador', compact('transportadors'));
      
    }

    public function create()
    {
        $transportadors = TransportadoraModel::all();
        return view('fretes/cadtransportador', compact('transportadors'));
      
    }


    public function store(Request $request)
    {
      $transportadors = TransportadoraModel::create([  
      'id' =>'1' ,   //aqui quero pegar o id da tabela
      'Transportadora' => $request->input('Transportadora'),
      'Token' => $request->input('Token'),
      'Client_id' => $request->input('Client_id'),
      'Client_Secret' => $request->input('Client_Secret'),
      'User_Agent' => $request->input('User_Agent'),
      'Nome_Aplicacao' => $request->input('Nome_Aplicacao') ,                       

      
      'Authorization' => $request->input('Authorization'),
      'Url_Redir' => $request->input('Url_Redir'),
      'CallBack' => $request->input('CallBack'),
      'Url_transp' => $request->input('Url_transp'),
      'Content_Type' => $request->input('Content_Type'),   
      'scope' => $request->input('scope')


    ]);
      return redirect('transportadoras');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $transportadors = TransportadoraModel::find($id);
 
        return isset($transportadors) 
            ? view('fretes/edittransportador', compact(['transportadors'])) 
            : redirect()->route('transportadoras');
    }


    public function update(Request $request, $id)
    {
        $transportadors = TransportadoraModel::where('id', $id)->first();
        $transportadors->Transportadora = $request->input('Transportadora');
        $transportadors->Token = $request->input('Token');
        $transportadors->Client_id = $request->input('Client_id');
        
        $transportadors->Client_Secret = $request->input('Client_Secret');
        $transportadors->User_Agent = $request->input('User_Agent');
        $transportadors->Nome_Aplicacao = $request->input('Nome_Aplicacao');                        
  
        
        
        
        $transportadors->Authorization = $request->input('Authorization');
        $transportadors->Url_Redir= $request->input('Url_Redir');
        $transportadors->CallBack = $request->input('CallBack');
        $transportadors->Url_transp = $request->input('Url_transp');
        $transportadors->Content_Type = $request->input('Content_Type');   
        $transportadors->scope = $request->input('scope');   
  
        $transportadors->save();   
            return redirect()->route('transportadoras');

    }

    public function destroy($id)
    {
        $transportadors = TransportadoraModel::where('id', $id)->delete();
       
        if ($transportadors) {
            return redirect()->route('transportadoras');
        }
    }

    public function fretemelhorenvio()
    {
        $transportadors = TransportadoraModel::all();
       return view('fretes/fretemelhorenvio', compact(['transportadors']));
        //return redirect()->route('fretes/callback');

    }

    public function callback(REQUEST $request)
    {

       $query = http_build_query([
        'client_id' => '1984',
        'redirect_uri' => 'http://pagamentos.test/fretes/callback/callbackret',
        'response_type' => 'code',
           'scope' => 'cart-read cart-write companies-read companies-write coupons-read coupons-write notifications-read orders-read products-read products-write purchases-read shipping-calculate shipping-cancel shipping-checkout shipping-companies shipping-generate shipping-preview shipping-print shipping-share shipping-tracking ecommerce-shipping transactions-read users-read users-write'
    ]);
return redirect("https://sandbox.melhorenvio.com.br/oauth/authorize?$query");
    }

    
    public function callbackret()
    {
       $transportadors = TransportadoraModel::all();
       return view('fretes/callback/callbackret');


    }



    public function fretes(Request $request){   
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

//var_dump($envioencode);
        
       
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
       // return view('/meiosdepagamento.index', compact(['data','variavelnossocep','variavelcep','variavelvlfrete','variavelaltura','variavellargura','variavelalcomprimento','variavelpeso','variavelseguro']));
      
         return view('fretes/fretes',compact(['data','variavelnossocep','variavelcep','variavelvlfrete','variavelaltura','variavellargura','variavelalcomprimento','variavelpeso','variavelseguro']));
          
    
      }  
}




