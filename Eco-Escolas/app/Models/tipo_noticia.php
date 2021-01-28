<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_noticia extends Model
{
    use HasFactory;
    
    protected $table = 'tipo_noticia';

    public function noticias(){
        return $this->hasMany('App\Noticia', 'tipo_noticia_id', 'id');
    }
}
