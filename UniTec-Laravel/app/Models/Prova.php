<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    use HasFactory;
    protected $fillable = ['id_prova', 'local_arquivo', 'id_materia', 'id_professor'];
}
