<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'eventoId',
        'user_id',
        'orcamento',
        'nome_evento',
        'desc_evento',
        'data_evento',
        'local_evento',
        'info_contato',
        'status_proposta',
    ];
}
