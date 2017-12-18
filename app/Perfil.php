<?php

namespace App;

use App\Usuario;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['descricao'];
    protected $hidden = ['created_at', 'updated_at'];


    public function usuarios() {
        return $this->belongsToMany(Usuario::class);
    }
}
