<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegistrationPage extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function registration()
    {
        $this->validate();
        dd($this->name, $this->email, $this->password, $this->password_confirmation);
    }

    public function render()
    {
        return view('livewire.auth.registration-page')->layout('components.layouts.auth');
    }
}
