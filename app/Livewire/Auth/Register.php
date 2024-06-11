<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Register extends Component
{
    public RegisterForm $form;

    public function submit()
    {
        $this->form->verify();
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
