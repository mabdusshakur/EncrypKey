<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class LoginPage extends Component
{
    public $email, $password, $remember_me;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            if ($this->remember_me) {
                Cookie::queue('email', $this->email, 60 * 24 * 7);
                Cookie::queue('password', $this->password, 60 * 24 * 7);
            }
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Email or password is incorrect.');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-page')->layout('components.layouts.auth');
    }
}
