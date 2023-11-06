<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;
    protected $fillable = ['data_vencimento','id_uso_estacionamento','data_parcela','id_usuario','status_pg','cond_pg','data_pagamento', 'valor','descricao'];
}
