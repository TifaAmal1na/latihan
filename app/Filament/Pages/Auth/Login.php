<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Login extends Page
{
    protected static string $view = 'filament.pages.auth.login';

    public $email;
    public $password;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('filament.pages.dashboard');
        }

        session()->flash('error', 'Invalid credentials.');
    }
}

