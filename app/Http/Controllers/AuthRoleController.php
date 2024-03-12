<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthRoleController extends Controller
{

public function dashboard(Request $request)
{
        $user = auth()->user();

        if ($user->rol === 'Administrador') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->rol === 'Asistente') {
            return redirect()->route('asistente.dashboard');
        } else {
            return redirect()->route('logout');
        }
}

public function profile(){
    return view('configurar_perfil');
}

}
