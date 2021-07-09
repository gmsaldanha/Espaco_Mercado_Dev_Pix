<?php

namespace App\Models\ContasBancarias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransacoesModel extends Model
{
    protected $fillable = [
        'id_banco',
        'Conta',
        'Historico',
        'Op',
        'Valor',
        'Payload',
'Calendario',
'Location',
'Txid',
'Revisao',
'Cpf_devedor',
'Nome_devedor',
'Valordev',
'Chave',
'Solicitacao',
'Statusoperacao',    
'Endtoendid',
'Pagadorcpf' ,
'Pagadornome',
'Horario',
'Rtrid',
        'Status',
        'Data_trans',
        'Data_rec'



    ];
}
