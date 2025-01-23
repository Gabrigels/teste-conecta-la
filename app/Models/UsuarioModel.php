<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
	protected $table = 'usuario';

	protected $fillable = [
        'nome',
        'email',
		'senha',
		'telefone',
        'ativo',
    ];

}
