<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = "salas";
    protected $fillable = ['sala', 'descricao'];

    public function obras() {
        return $this->hasMany('App\Obra');
    }

    public function artefatos() {
        return $this->hasMany('App\Artefato');
    }
}
