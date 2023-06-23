<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    //forzar el nombre de la tabla posts
    protected $table = 'posts';
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function comentarios(){
        return $this->hasMany(comentarios::class);
    }
}
