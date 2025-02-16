<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class Register extends Page
{
    protected static string $view = 'filament.pages.auth.register';

    public $name;
    public $email;
    public $password;

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registration successful!');
        return redirect()->route('filament.auth.login');
    }
}

