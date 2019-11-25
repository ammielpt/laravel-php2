<?php

namespace App\Http\Controllers;

use App\Mail\MessageRecived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request){
        //return $request->get('name');
      $message=request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'content'=>'required|min:3'
        ],[
            'name.required'=>__('I need your name')
        ]);
        Mail::to('ammiel16@gmail.com')->send(new MessageRecived($message));
       // return new MessageRecived($message);
        return back()->with('status', 'Recibimos tu mensaje te responderemos en menos de 24 horas.');
    }

   /* public function store(){
        return request('name');
    } */
}
