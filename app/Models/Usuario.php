<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\AssignOp\Mul;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario'; // Nome da tabela
    protected $primaryKey = 'id_usuario'; // Chave primária
    public $timestamps = true; // created_at e updated_at

    protected $fillable = [
        'id_usuario',
        'nome_usuario',
        'email',
        'senha',
        'curso',
        'matricula',
        'vinculo'
    ];

    protected $hidden = [
        'senha', // Corrigido para esconder a senha
    ];

    // Método para indicar qual campo será usado para a senha
    public function getAuthPassword()
    {
        return $this->senha;
    }

    // Relação com Reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'user_id', 'id_usuario');
    }
}