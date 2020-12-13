<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artefato extends Model
{
    protected $table = "artefatos";
    protected $fillable = ['nome', 'info', 'img', 'idade', 'sala_id'];

    public function sala() {
        return $this->belongsTo('App\Sala');
    }
}
