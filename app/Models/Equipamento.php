<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = 'equipamentos'; // Nome da tabela
    protected $primaryKey = 'id_equipamentos'; // Chave primária
    public $timestamps = false; // Se não houver created_at e updated_at

    protected $fillable = [
        'nome',
        'quantidade',
        'descricao',
    ];

    // Relação com Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_equipamentos', 'id_equipamentos');
    }
}
