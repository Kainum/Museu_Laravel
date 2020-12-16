<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoSala extends Model
{
    protected $table = 'evento_salas';
    protected $fillable = ['evento_id', 'sala_id'];

    public function sala() {
        return $this->belongsTo("App\Sala");
    }
}
