<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perfil;

class Usuario extends Model
{
    protected $fillable = ['login', 'nome', 'senha', 'perfil_id'];
    protected $hidden = ['created_at', 'updated_at'];


    public function perfil() {
        return $this->belongsTo(Perfil::class);
    }
}
