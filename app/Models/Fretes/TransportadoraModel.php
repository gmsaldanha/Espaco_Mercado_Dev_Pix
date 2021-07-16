<?php

namespace App\Models\Fretes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportadoraModel extends Model
{
    protected $fillable = [
        'id',
  'Transportadora',  
  'Token',  
  'Client_id',  
  'Authorization',  
  'Url_Redir',  
  'CallBack',  
  'Url_transp',  
  'Content_Type',  
  'scope'  

    ];
}
