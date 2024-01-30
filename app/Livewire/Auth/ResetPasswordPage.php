<?php

namespace App\Livewire\Auth;

use App\Models\ResetPassword;
use App\Models\User;
use Livewire\Component;

class ResetPasswordPage extends Component
{
    public $token, $password, $password_confirmation;

    protected $rules = [
        'password' => 'required|min:8|confirmed',
    ];

    public function mount()
    {
        $this->token = request()->query('token');
        $isTokenExists = ResetPassword::where('token', $this->token)->exists();
        $isTokenUsed = ResetPassword::where('token', $this->token)->where('is_used', true)->exists();
        if (!$isTokenExists || $isTokenUsed) {
            session()->flash('error', 'Invalid token!');
            return redirect()->route('forgot-password');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetPassword()
    {
        $this->validate();
        $ResetPassword = ResetPassword::where('token', $this->token)->update([
            'is_used' => true,
            'used_at' => now(),
        ]);
        if (!$ResetPassword) {
            session()->flash('error', 'Something went wrong!');
            return redirect()->route('forgot-password');
        }
        $requestedUsed = ResetPassword::where('token', $this->token)->first();
        $user = User::where('email', $requestedUsed->email)->first();
        $user->update([
            'password' => bcrypt($this->password),
        ]);
        session()->flash('success', 'Password reset successfully!');
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.auth.reset-password-page')->layout('components.layouts.auth');
    }
}
