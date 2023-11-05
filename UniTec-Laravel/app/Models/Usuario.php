<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'id_pessoa',
        'senha',
        'id_professor',
        'id_aluno',
        'id_loja',
        'id_curso'
    ];

}
