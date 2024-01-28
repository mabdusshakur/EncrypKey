<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class EmailVerificationPage extends Component
{
    public function render()
    {
        return view('livewire.auth.email-verification-page')->layout('components.layouts.auth');
    }
}
