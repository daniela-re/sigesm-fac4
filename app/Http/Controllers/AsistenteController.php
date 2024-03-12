<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recurso;
use Illuminate\Database\QueryException;

class AsistenteController extends Controller
{
    public function dashboard()
    {
        $recursos = Recurso::all();
        return view('asistente.Asistente_1', compact('recursos'));
    }

    public function dashboard_2()
    {
        $recursosSobrantes = Recurso::where('sobrante', true)->get();
        return view('asistente.Asistente_2', compact('recursosSobrantes'));
    }

    public function store(Request $request)
    {
        try{ 

        Recurso::create($request->all());

        return redirect()->back()->with('success', 'Recurso creado exitosamente.');

        // Manejar los errores que se puedan producir

        } catch (QueryException $e) {
            $errorMessage = "Error al crear: " . $e->getMessage();
            return redirect()->back()->withInput()->withErrors(['error' => $errorMessage]);
        }
    }

    
    public function pasarASobrantes(Request $request)
    {
        $id = $request->input('id');
        $descuento = $request->input('descuento');
        $recurso = Recurso::findOrFail($id);

        // Verifica si hay suficiente disponibilidad para pasar a sobrantes

        if ($recurso->disponibilidad >= $descuento) {

            // Actualiza el estado a sobrantes y reduce la disponibilidad
            
            $recurso->update([
                'sobrante' => true,
                'disponibilidad' => $recurso->disponibilidad - $descuento,
            ]);

            return redirect()->back()->with('success', 'Recurso utilizado correctamente.');
        }

        // Manejar los errores que se puedan producir

        return redirect()->back()->with('error', 'No hay suficiente disponibilidad para pasar a Sobrantes.');
    }
    public function update(Request $request)
    {
        try{ 
        $id = $request->input('id');
        $recurso = Recurso::findOrFail($id);
        $recurso->update($request->all());

        return redirect()->back()->with('success', 'Recurso actualizado exitosamente.');
        
        // Manejar los errores que se puedan producir

        } catch (QueryException $e) {
            $errorMessage = "Error al actualizar: " . $e->getMessage();
            return redirect()->back()->withInput()->withErrors(['error' => $errorMessage]);
        }
    
    }

    public function delete($id)
    {
        try{ 

        $recurso = Recurso::findOrFail($id);
        $recurso->delete();

        return redirect()->back()->with('success', 'Recurso eliminado exitosamente.');
            
        // Manejar los errores que se puedan producir

        } catch (QueryException $e) {
            $errorMessage = "Error al eliminar: " . $e->getMessage();
            return redirect()->back()->withInput()->withErrors(['error' => $errorMessage]);
        }

    }


}
