<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nome',
        'cliente_id',
        'tipo',
        'dataLimite',
        'supervisor_id',
        'responsavel_id',
        'obs',
    ];
}
