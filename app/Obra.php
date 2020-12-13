<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = "obras";
    protected $fillable = ['nome', 'info', 'img', 'data_conclusao', 'artista_id', 'sala_id'];

    public function artista() {
        return $this->belongsTo('App\Artista');
    }

    public function sala() {
        return $this->belongsTo('App\Sala');
    }
}
