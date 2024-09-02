<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas'; // Nome da tabela
    protected $primaryKey = 'id_reserva'; // Chave primária
    public $timestamps = false; // Se não houver created_at e updated_at

    protected $fillable = [
        'id_equipamentos',
        'user_id',
        'data_inicio',
        'data_fim',
        'local',
    ];

    // Relação com Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'id_usuario');
    }

    // Relação com Equipamentos
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class, 'id_equipamentos', 'id_equipamentos');
    }
}
