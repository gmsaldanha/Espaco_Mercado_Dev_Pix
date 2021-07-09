<?php

namespace App\Models\ContasBancarias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasModel extends Model
{
    protected $fillable = [
        'id_banco',
        'Banco',
        'NumBanco',
        'Agencia',
        'Conta',
        'CodigoPix',
        'Titular',
        'Logradouro',
        'Municipio',
        'Uf',
        'TxId',
        'Padrao',
        'Data'
    
    ];
}
