<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginForm extends Form
{
    #[Validate(['required', 'email'])]
    public $email;

    #[Validate(['required'])]
    public $password;

    public function verify()
    {
        $this->validate();

        $user = User::query()->where('email', $this->email)->first();
        if (!$user || !Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials do not match our records.'],
            ]);
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}
