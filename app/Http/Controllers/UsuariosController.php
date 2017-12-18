<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private $usuario;
    private $perfil;

    public function __construct(Usuario $usuario, Perfil $perfil) {
        $this->usuario = $usuario;
        $this->perfil  = $perfil;
    }

    public function usuarios() {
        $usuarios = $this->usuario->all();
        return response()->json($usuarios);
    }

    public function store(Request $request) {
        $usuario = $this->usuario->create($request->all());
        return response()->json($usuario);
    }

    public function show(Request $request, $id) {
        $usuario = $this->usuario->find($id);
        return response()->json($usuario);
    }

    public function update(Request $request, $id) {
        $usuario = $this->usuario->find($id);
        $usuario->update($request->all());
        return response()->json($usuario);
    }

    public function delete(Request $request, $id) {
        $usuario = $this->usuario->find($id);
        $usuario->delete();
        return response()->json(['msg' => 'Usuário removido.']);
    }

    public function perfil(Request $request, $id) {
        $usuario  = $this->usuario->find($id);
        $perfil = $usuario->perfil;
        return response()->json($perfil);
    }
    
    public function associarPerfil(Request $request, $id, $perfil_id) {
        $usuario  = $this->usuario->find($id);
        $usuario->perfil_id = $perfil_id;
        $usuario->save();
        return response()->json($usuario);
    }

    public function desassociarPerfil(Request $request, $id) {
        $usuario  = $this->usuario->find($id);
        $usuario->perfil_id = null;
        $usuario->save();
        return response()->json($usuario);
    }
}
