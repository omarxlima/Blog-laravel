<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('admin.user.index', compact('usuarios'));
    }

    public function edit($id){
        $usuario = User::find($id);
        return view('admin.user.edit', compact('usuario'));
    }

    public function update(Request $request, $id){
        $usuario = User::find($id);
        if ($usuario) {

           $usuario->role_as = $request->acesso;
           $usuario->update();

           return to_route('users.index')->with('message', 'Usuário atualizado com sucesso!');
        }
        return to_route('users.index')->with('message', 'Usuário não encontrado!');
    }
}
