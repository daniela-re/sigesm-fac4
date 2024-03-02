<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthRoleController extends Controller
{

public function dashboard(Request $request)
{
        $user = auth()->user();

        if ($user->rol === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->rol === 'asistente') {
            return redirect()->route('asistente.dashboard');
        } else {
            return redirect('/');
        }
}


}
