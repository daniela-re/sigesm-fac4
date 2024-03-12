<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recurso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Obtener todos los datos desde la base de datos
        $count = User::count();
        $count_recursos = Recurso::count();
        $recursos = Recurso::All();

        // Pasar los usuarios a la vista
        return view('admin.Administrador_1', [
            'count'=> $count,
            'count_recursos' => $count_recursos,
            'recursos' => $recursos,
        ]);
    }

    public function dashboard_2()
    {
        // Obtener todos los usuarios desde la base de datos
        $users = User::all();

        // Pasar los usuarios a la vista
        return view('admin.Administrador_2', ['users'=> $users]);
    }

    public function create(Request $request)
    {
        try{ 
            // Crear el nuevo usuario
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'rol' => $request->input('rol'),
                'password' => Hash::make($request->input('password')),
            ]);
            //Volver a la vista anterior, con un mensaje existoso
            return redirect()->back()->with('success', 'Usuario registrado exitosamente');

            // Manejar los errores que se puedan producir
        } catch (QueryException $e) {
            $errorMessage = "Error al crear el usuario: " . $e->getMessage();
            return redirect()->back()->withInput()->withErrors(['error' => $errorMessage]);
        }

    }

    public function delete($id)
    {
        try {
            // Encuentra el usuario por ID y elimínalo
            $usuario = User::findOrFail($id);
            $usuario->delete();

            // Volver a la vista con un mensaje exitoso
            return redirect()->back()->with('success', 'Usuario eliminado exitosamente');
            
            // Manejar la excepción si ocurre algún error al eliminar
        } catch (QueryException $e) {
            $errorMessage = "Error al eliminar el usuario: " . $e->getMessage();
            return redirect()->back()->withErrors(['error' => $errorMessage]);
        }
    }

}
