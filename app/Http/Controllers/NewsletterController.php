<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Não foi possivel registrar o seu email nos nosso contatos.'
            ]);
        }

        return redirect('/')
            ->with('success', 'Seu email foi adicionado em nossos contatos!');
    }
}