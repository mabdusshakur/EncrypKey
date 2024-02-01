<?php

namespace App\Livewire\Auth;

use App\Mail\Auth\VerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        $verification_token = sha1(time());
        $owner_id = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'verification_token' => $verification_token,
            'owner_id' => $owner_id,
        ]);

        $mail_data = [
            'subject' => 'Email Verification',
            'verification_url' => route('verify-email', ['token' => $verification_token]),
        ];

        Mail::to($this->email)->send(new VerificationMail($mail_data));

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.registration-page')->layout('components.layouts.auth');
    }
}
