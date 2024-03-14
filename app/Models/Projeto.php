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

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tasks', 'projeto_id', 'utilizador_id');
    }

    public function supervisor(){
        return $this->belongsTo(User::class,'supervisor_id');
    }
}
