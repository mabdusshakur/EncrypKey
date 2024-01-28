<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class RegistrationPage extends Component
{
    public function render()
    {
        return view('livewire.auth.registration-page')->layout('components.layouts.auth');
    }
}
