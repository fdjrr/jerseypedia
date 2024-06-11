<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:255'])]
    public $name;

    #[Validate(['required', 'email', 'min:3', 'max:255'])]
    public $email;

    #[Validate(['required', 'min:8'])]
    public $password;

    #[Validate(['required', 'same:password'])]
    public $confirm_password;

    public function verify()
    {
        $this->validate();

        $user = User::query()->where('email', $this->email)->first();
        if ($user) {
            throw ValidationException::withMessages([
                'email' => ['The email has already been taken.'],
            ]);
        }

        $user           = new User();
        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }
}
