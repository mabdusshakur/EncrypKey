<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class ChangePassword extends Component
{
    public $password, $new_password;

    protected $rules = [
        'password' => 'required|min:8',
        'new_password' => 'required|min:8',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function changePassword()
    {
        try {
            $this->validate();
            $user = auth()->user();
            if (!\Hash::check($this->password, $user->password)) {
                session()->flash('error', 'Current password is incorrect.');
                return;
            }

            $updated = $user->update([
                'password' => bcrypt($this->new_password),
            ]);

            if (!$updated) {
                session()->flash('error', 'Something went wrong.');
                return;
            }

            session()->flash('success', 'Password changed successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.profile.change-password');
    }
}
