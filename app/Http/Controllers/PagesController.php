<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('home');
    }

    public function saludo($nombre='Invitado'){
        $html="<h2>Contenido Html</h2>";
        $script= "<script>alert('Problema XSS - Cross site Scripting!!')</script>";
        $consolas= [
            "Play Station",
            "Xbox One",
            "Wii u"
        ];
        return view('saludo', compact('nombre', 'html', 'script', 'consolas'));
    }

    public function mensaje(Request $request){
       //Validando el formulario
       $this->validate($request, [
           'nombre'=>'required',
           'email'=>'required|email',
           'mensaje'=>'required|min:5'
       ]);
        $data= $request->all();
        //return response()->json(['data'=>$data],201)->header('TOKEN', 'secret');
        //return redirect('/');
        // redireccionar a pagina saludo; return redirect()->route('saludo');

        // manejando sesiones con with 
        return redirect()
        ->route('saludo')
        ->with('info', 'Tu mensaje ha sido enviado correctamente');
    }

    public function mostrarContacto(){
        return view('contacto');
    }
}
