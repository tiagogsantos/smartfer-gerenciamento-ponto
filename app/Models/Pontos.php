<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontos extends Model
{
    use HasFactory;

    protected $table = 'pontos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'data',
        'entrada',
        'saida',
        'pausa_inicio',
        'pausa_fim',
    ];

    // Um ponto pertence a um usuário
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
