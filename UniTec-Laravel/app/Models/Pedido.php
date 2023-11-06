<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['id_pedido', 'id_pedido_item', 'qtd_item','status_pedido','id_usuario'];
}
