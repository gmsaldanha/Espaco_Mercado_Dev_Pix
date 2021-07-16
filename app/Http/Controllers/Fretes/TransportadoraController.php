<?php

namespace App\Http\Controllers\Fretes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
