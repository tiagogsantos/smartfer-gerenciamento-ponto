<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atestados extends Model
{
    use HasFactory;

    protected $table = 'atestados';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'descricao',
        'data_inicio',
        'data_fim',
        'arquivo',
        'status',
        'justificativa',
        'analisado_por',
    ];

    // Um atestado pertence a um usuário (quem enviou)
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Um atestado pode ser analisado por um usuário do tipo RH
    public function analisadoPor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'analisado_por');
    }

}
