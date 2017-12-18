<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;

class PerfisController extends Controller
{
    private $perfil;

    public function __construct(Perfil $perfil) {
        $this->perfil = $perfil;
    }

    public function perfis() {
        $perfis = $this->perfil->all();
        return response()->json($perfis);
    }

    public function store(Request $request) {
        $perfil = $this->perfil->create($request->all());
        return response()->json($perfil);
    }

    public function show($id) {
        $perfil = $this->perfil->find($id);
        return response()->json($perfil);
    }
    
    public function update(Request $request, $id) {
        $perfil = $this->perfil->find($id);
        $perfil->update($request->all());
        return response()->json($perfil);
    }

    public function delete(Request $request, $id) {
        $perfil = $this->perfil->find($id);
        $perfil->delete();
        return response()->json(['msg' => 'Perfil removido.']);
    }
}
