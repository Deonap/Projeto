<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'telemovel',
        'telefone',
        'morada',
        'codigoPostal',
        'localidade',
    ];

    public function projetos(){
        return $this->hasMany(Projeto::class,'cliente_id');
    }

}
