<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Informações incorretas.'
            ]);
        }
        session()->regenerate();
        return redirect('/')->with('success', 'Bem vindo!');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/')->with('success','Até mais');
    }
    
}