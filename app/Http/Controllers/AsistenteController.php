<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsistenteController extends Controller
{
    public function index()
    {
        return view('asistente.Asistente_1');
    }
}