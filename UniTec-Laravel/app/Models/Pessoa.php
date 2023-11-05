<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = "pessoas";
    protected $fillable = ['nome_pessoa','nome_fantasia','cpf','cnpj','endereco','tipo_pessoa','email'];
    public $dados_pessoa = ['nome_pessoa', 'email'];
}
