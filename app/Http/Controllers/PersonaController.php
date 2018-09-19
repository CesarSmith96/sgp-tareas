<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use sgp\Persona;

class PersonaController extends Controller
{
     public function getIndex()
    {
    	/*$clientes = Cliente::all();
    	return view('cliente.clientemostrar',['clientes'=>$clientes]);*/
    	return view('persona.crearpersona');

    }
}
