<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";
    protected $fillable = ['nome_evento', 'dt_inicio', 'dt_fim', 'dt_lmt_inscricao', 'info'];

    public function salas() {
        return $this->hasMany("App\EventoSala");
    }
}
