<?php

namespace App\Models\Responses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PspModel extends Model
{
    protected $fillable = [
        'id_banco',
        'EndPoint',
        'PutPoint',
        'GetPoint',
        'grant_type',
        'scope',
        'Content_Type',
        'Authorization'
          
    ];
}
