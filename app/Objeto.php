<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    protected $table = "objetos";
    protected $fillable = ['nome', 'info', 'img'];
}
