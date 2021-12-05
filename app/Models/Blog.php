<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['id_users','titulo', 'contenido', 'image'];

    //relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(user::class, 'id', 'id_users');
    }
}
