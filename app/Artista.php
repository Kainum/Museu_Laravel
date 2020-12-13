<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = "artistas";
    protected $fillable = ['nome', 'info', 'img'];

    public function obras() {
        return $this->hasMany('App\Obra');
    }
}
