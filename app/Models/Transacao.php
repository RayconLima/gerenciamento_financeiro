<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'transacoes';

    protected $fillable = [
        'id',
        'data',
        'tipo',
        'descricao',
        'valor',
        'categoria',
        'repeticao',
        'fixo',
        'user_id',
    ];
}
