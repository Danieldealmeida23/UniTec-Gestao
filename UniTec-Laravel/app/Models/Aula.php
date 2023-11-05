<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_aula',
        'id_materia',
        'horario_periodo',
        'horario_aula',
        'id_professor'
    ];



}
