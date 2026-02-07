<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return Inertia::render('Admin/Users/Index', ['usuarios' => $usuarios]);
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return Inertia::render('Admin/Users/Edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->role_as = $request->acesso;
        $usuario->update();
        return to_route('users.index')->with('message', 'Usuário atualizado com sucesso!');
    }
}
