<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return Inertia::render('Auth/Login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role_as == '1') {
            return redirect()->intended(route('dashboard'))->with('message', 'Bem-vindo!');
        }
        return redirect()->intended(route('home_page.index'))->with('message', 'Logado com sucesso!');
    }
}
