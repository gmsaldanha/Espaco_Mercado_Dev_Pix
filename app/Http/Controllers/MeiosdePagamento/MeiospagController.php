<?php

namespace App\Http\Controllers\MeiosdePagamento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeiospagController extends Controller
{

/*
    public function __construct()  //funcao paypal
    {
          $paypal_conf = \Config::get('paypal');
          $this->_api_context = new ApiContext(new OAuthTokenCredential(
               $paypal_conf['client_id'],    
               $paypal_conf['secret'])    
           );
$this->_api_context->setConfig($paypal_conf['settings']);
     }


     public function pagarComPayPal(Request $request) {
        $pagador = new Payer();     
        $pagador->setPaymentMethod('paypal');     
        $item_1 = new Item();     
        $item_1->setName('Item 1')-> setCurrency('BRL')->setQuantity(1)->setPrice($request->get('amount'));
        $lista_itens = new ItemList();     
        $lista_itens->setItems(array($item_1));     
        $valor = new Amount();     
        $valor->setCurrency('BRL')->setTotal($request->get('amount'));     
        $transacao = new Transaction();     
        $transacao->setAmount($valor)->setItemList($lista_itens)->setDescription('Your transaction description');     
        $urls_redirecionamento = new RedirectUrls();     
        $urls_redirecionamento->setReturnUrl(URL::route('status'))->setCancelUrl(URL::route('status'));     
        $pagamento = new Payment();     
        $pagamento->setIntent('Sale')->setPayer($pagador)->setRedirectUrls($urls_redirecionamento)->setTransactions(array($transacao));
        try {     
            $pagamento->create($this ->_api_context);     
        } catch (\PayPal\Exception\PPConnectionException $e) {     
            if (\Config::get('app.debug')) {\     
                Session::put('error', 'Tempo Limite de Conexão Excedido');     
                return Redirect::route('home');     
            } else {\     
                Session::put('error', 'Serviço fora do ar, tente novamente mais tarde.');     
                return Redirect::route('home');     
            }     
        }     
        foreach($pagamento->getLinks() as $link) {     
            if ($link->getRel() == 'approval_url') {     
                $url_redirecionar = $link->getHref();     
                break;    
            }    
        }

*/


/////////////////////////////////////////////////






    public function index(){
    return view('/meiosdepagamento.index');        
    }

    public function pay(){
    return view('meiosdepagamento.pay');        
    }

    public function qrcode(){
    return view('meiosdepagamento.qrcode');        
    }
    public function bb(){
    return view('meiosdepagamento.bb.bb');        
    }
    public function cc(){
    return view('meiosdepagamento.cc.cc');        
    }
    
    public function cd(){
    return view('meiosdepagamento.cd.cd');        
}

public function mp(){
    return view('meiosdepagamento.mp.mp');        
}
public function py(){
    return view('meiosdepagamento.py.py');        
}









                            
}
