<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    // define nome tabela no banco
    protected $table = 'tarefas';

    // define chave primaria
    protected $primaryKey = 'id';

    // define se a chave é auto-increment
    public $incrementing = true;

    // definição do tipo do campo primario
    protected $keyType = 'integer';

    // ignora campo de criação e atualização
    public $timestamps = false;

    // define nome do campo de data de criação e atualização
    // const CREATED_AT = '';
    // const UPDATED_AT = '';

    // define campos que podem ser alterados em massa.
    protected $fillable = ['titulo'];
}
