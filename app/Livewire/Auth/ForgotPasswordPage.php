<?php

namespace App\Livewire\Auth;

use App\Mail\ForgotPasswordMail;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
        $this->validate();

        $isEmailExists = User::where('email', $this->email)->exists();
        if (!$isEmailExists) {
            session()->flash('error', 'Email not found!');
            return redirect()->route('forgot-password');
        }

        $verification_token = sha1(time());
        $ResetPassword = ResetPassword::create([
            'email' => $this->email,
            'token' => $verification_token,
        ]);

        if (!$ResetPassword) {
            session()->flash('error', 'Something went wrong!');
            return redirect()->route('forgot-password');
        }

        $mail_data = [
            'subject' => 'Reset Password',
            'reset_password_url' => route('reset-password', ['token' => $verification_token]),
        ];

        Mail::to($this->email)->send(new ForgotPasswordMail($mail_data));
        session()->flash('success', 'Password reset link sent on your email.');
    }
    public function render()
    {
        return view('livewire.auth.forgot-password-page')->layout('components.layouts.auth');
    }
}
