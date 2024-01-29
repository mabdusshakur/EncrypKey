<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class ForgotPasswordPage extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function forgotPassword()
    {
        session()->flash('success', 'Password reset link sent on your email.');
    }
    public function render()
    {
        return view('livewire.auth.forgot-password-page')->layout('components.layouts.auth');
    }
}
