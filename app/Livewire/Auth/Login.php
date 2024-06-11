<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    public LoginForm $form;

    public function submit()
    {
        $this->form->verify();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
