<?php

namespace App\Http\Controllers\MeiosdePagamento\ContasBancarias;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContasBancarias\ContasModel;
use App\Models\ContasBancarias\TransacoesModel;
use App\Http\Controllers\MeiosdePagamento\Pix\PixController;

class ContasController extends Controller
{

    public function index(){   
        
      $contas = ContasModel::all();
    return view('meiosdepagamento/contasbancarias.contas', compact('contas'));
  
  }    
  

    public function create()
    { $contas = ContasModel::all();
      return view('meiosdepagamento/contasbancarias.cadcontas', compact('contas'));
   
    }

    public function store(Request $request)
    {
          $check =   $request->input('padrao'); 
          if ($check =='on'){ $padrao =1; } else {$padrao=0;}
        $contas = ContasModel::create([  
        'id_banco' =>'1' ,   //aqui quero pegar o id da tabela
        'Banco' => $request->input('nomebanco'),
        'NumBanco' => $request->input('numbanco'),
        'Agencia' => $request->input('agencia'),
        'Conta' => $request->input('conta'),
        'CodigoPix' => $request->input('pix'),
        'Titular' => $request->input('titular'),
        'Logradouro' => $request->input('logradouro'),
        'Municipio' => $request->input('municipio'),   
        'Uf' => $request->input('uf'),  
        'TxId' => $request->input('txid'),  
        'Padrao' => $padrao, 
        'Data' => $request->input('data')  
    ]);
        return redirect('contas');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $contas = ContasModel::find($id);
 
        return isset($contas) 
            ? view('meiosdepagamento/contasbancarias.editcontas', compact(['contas'])) 
            : redirect()->route('contas');
    }


    public function update(Request $request, $id)
    {  //dd($request, $id);
      //dd($psps);


        $contas = ContasModel::where('id', $id)->first();
        $check =   $request->input('padrao'); 
        if ($check =='on'){ $padrao =1; } else {$padrao=0;}
        $contas->Banco = $request->input('nomebanco');
        $contas->NumBanco = $request->input('numbanco');
        $contas->Agencia = $request->input('agencia');
        $contas->Conta = $request->input('conta');
        $contas->CodigoPix = $request->input('pix');
        $contas->Titular = $request->input('titular');
        $contas->Logradouro = $request->input('logradouro');
        $contas->Municipio = $request->input('municipio');   
        $contas->Uf = $request->input('uf');  
        $contas->TxId = $request->input('txid');  
        $contas->Padrao = $padrao;
        $contas->Data = $request->input('data');
        $contas->save();   
            return redirect()->route('contas');
    }

    public function destroy($id)
    {
        $contas = ContasModel::where('id', $id)->delete();
       
        if ($contas) {
            return redirect()->route('contas');
        }

     }




     public function finvenda(Request $request)
     {

      $contas = DB::table('contas_models')->select('id_banco','Conta')->first() ;
       $Historico ='Venda finalizada com Pix' ;   
      $transacao = TransacoesModel::create([  
        'id_banco' =>$contas->id_banco,  
        'Conta' => $contas->Conta,
        'Historico' => $Historico,
        'Op' => 'S',
        'Valor' => $request->input('vlvalor'),  
        'Payload' => $request->input('payload'),  
        'Status' => 'F',
        'Data_trans' => date('Y-m-d H:i:s'),
        'Data_rec' => date('Y-m-d H:i:s')
      
     ]);
     return redirect()->route('meiospagindex');
     }


     public function editvenda(Request $request)
     {
        $contas = DB::table('contas_models')->select('id_banco','Conta')->first() ;
      
        $affected = DB::table('contas_models')
        ->where('id_banco', $contas->id)
        ->update(['Calendario' => 1]);    
     }

     public function transacoes(){   
      $transacoes = transacoesModel::all();
      return view('meiosdepagamento/contasbancarias.transacoes', compact('transacoes'));
       
    }  
         
    
    public function consultas(){   
      $transacoes = transacoesModel::all();
      return view('meiosdepagamento/contasbancarias.consultas', compact('transacoes'));
       
    }  
    
    
    
    public function consultastoken(){   
      $transacoes = transacoesModel::all();
      $psps = PspModel::all();
      return view('meiosdepagamento/contasbancarias.consultastoken', compact(['transacoes','psps']));
       
    }      




}
