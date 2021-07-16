<?php

namespace App\Http\Controllers\MeiosdePagamento\ContasBancarias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Responses\PspModel;
use App\Models\ContasBancarias\ContasModel;
use App\Models\ContasBancarias\TransacoesModel;


class PspController extends Controller
{

    public function index(){   
        
        $psps = PspModel::all();
      return view('meiosdepagamento/contasbancarias.listpsps', compact('psps'));
    
    }  

    public function create()
    {
        $psps = PspModel::all();
        return view('meiosdepagamento/contasbancarias.cadpsps', compact('psps'));
     
    }

    public function store(Request $request)
    {
      $contas = DB::table('contas_models')->select('id_banco')->first() ;
      $psps = PspModel::create([  
      'id_banco' =>$contas->id_banco, 
      'EndPoint' => $request->input('endpoint'),
      'PutPoint' => $request->input('putpoint'),
      'GetPoint' => $request->input('getpoint'),
      'grant_type' => $request->input('grant_type'),
      'scope' => $request->input('scope'),
      'Content_Type' => $request->input('content_Type'),
      'Authorization' => $request->input('authorization')
  ]);
  return redirect()->route('contas');
   
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {    $psps = PspModel::find($id);
 
        return isset($psps) 
            ? view('meiosdepagamento/contasbancarias.editpsp', compact(['psps'])) 
            : redirect()->route('psps');
        }

    public function update(Request $request, $id)
    {
      //dd($request, $id);
      //dd($psps);


        $psps = PspModel::where('id', $id)->first();
          
        #'id_banco' =>$contas->id_banco, 
        $psps->EndPoint = $request->input('endpoint');
        $psps->PutPoint = $request->input('putpoint');
        $psps->GetPoint = $request->input('getpoint');
        $psps->grant_type = $request->input('grant_type');
        $psps->scope = $request->input('scope');
        $psps->Content_Type = $request->input('content_Type');
        $psps->Authorization = $request->input('authorization');
        $psps->save();   
            return redirect()->route('contas');
      }
      




 
    public function destroy($id)
    {
      $psps = PspModel::where('id', $id)->delete();
       
        if ($psps) {
            return redirect()->route('psps');
        }
    }



    public function lancapix(Request $request)
    {

     $contas = DB::table('contas_models')->select('id_banco','Conta')->first() ;
      $Historico ='Venda finalizada com Pix' ;   
     $transacao = TransacoesModel::create([  
       'id_banco' =>$contas->id_banco,  
       'Conta' => $contas->Conta,
      'Historico' => $Historico,
       'Op' => 'S',
       //'Valor' => $request->input('valor'),  
       'Payload' => $request->input('payload1'),  
       'Status' => 'F',
       'Calendario' => $request->input('calendario'),  
       'Location' => $request->input('location'),  
       'Txid' => $request->input('txid'),  
       'Revisao' => $request->input('revisao'),  
       'Valordev' => $request->input('valor'),  
       'Chave' => $request->input('chave'),  
       'Solicitacao' => $request->input('solicitacaopagador'),  
       'Statusoperacao' => $request->input('status'),  
       'Data_trans' => date('Y-m-d H:i:s'),
       'Data_rec' => date('Y-m-d H:i:s')
       
    ]);
    return redirect()->route('meiospagindex');
    }




}
