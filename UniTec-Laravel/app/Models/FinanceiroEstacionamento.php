<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceiroEstacionamento extends Model
{
    use HasFactory;
    protected $fillable = ['id_vaga', 'status_pagamento','data_hora_saida','created_at','updated_at','id_usuario'];
}
